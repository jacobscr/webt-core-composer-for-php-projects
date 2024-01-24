<?php
require_once 'vendor/autoload.php';
use Jacob\WebtCoreComposerForPhpProjects\QRcode;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;

$result = Builder::create()
    ->writer(new PngWriter())
    ->data('Custom QR code contents')
    ->encoding(new Encoding('UTF-8'))
    ->build();

header('Content-Type: '.$result->getMimeType());
echo $result->getString();