<?php
include __DIR__ . '/../vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$request = new Request('GET', 'http://www.baidu.com');
$promise = $client->sendAsync($request)->then(function ($response) {
    echo $response->getBody();  //异步
});
// todo something
echo 1;
$promise->wait();
