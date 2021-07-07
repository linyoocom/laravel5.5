<?php
//phpinfo();
$im = new \imagick();
$im->setResolution(150, 150);
$im->readImage("./207da3015d45f0150f2b1f31fadfd544.pdf");
$im->setImageFormat('jpeg');
$im->setImageCompression(\imagick::COMPRESSION_JPEG);
$im->setImageCompressionQuality(100);
foreach ($im as $c => $_page) {
    $_page->writeImage("./test-$c.jpg");
}
$im->clear();
$im->destroy();
