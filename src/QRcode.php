<?php
namespace Jacob\WebtCoreComposerForPhpProjects;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;

class QRcode {
    public $result = Builder::create()
        ->writer(new PngWriter())
        ->data('Custom QR code contents')
        ->encoding(new Encoding('UTF-8'))
        ->build();
}