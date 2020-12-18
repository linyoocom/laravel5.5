<?php

include __DIR__ . '/../vendor/autoload.php';

$broker = '172.16.2.31:9092';//getenv('KAFKA_BROKERS');

// create consumer
$topicConf = new \RdKafka\TopicConf();
$topicConf->set('auto.offset.reset', 'largest');

$conf = new \RdKafka\Conf();
$conf->set('group.id', 'php-pubsub');
$conf->set('metadata.broker.list', $broker);
$conf->set('enable.auto.commit', 'false');
$conf->set('offset.store.method', 'broker');
$conf->set('socket.blocking.max.ms', 50);
$conf->setDefaultTopicConf($topicConf);

$consumer = new \RdKafka\KafkaConsumer($conf);

// create producer
$conf = new \RdKafka\Conf();
$conf->set('socket.blocking.max.ms', 50);
$conf->set('queue.buffering.max.ms', 20);

$producer = new \RdKafka\Producer($conf);
$producer->addBrokers($broker);


$adapter = new \Superbalist\PubSub\Kafka\KafkaPubSubAdapter($producer, $consumer);
$adapter->publish('my_channel_local', 'this is a new message1111');
sleep(3);   //本地运行太快,结束脚本,居然发送消息失败
/*for ($x = 0; $x < 10; $x++) {
    $adapter->publish('my_channel_local', 'this is a new message'.$x);
}*/
