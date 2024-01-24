<?php
namespace Jacob\WebtCoreComposerForPhpProjects;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;

class QRcode {
    public string $data;
    public function __construct(string $data) {
        $this->data = $data;
    }
    public function generate() {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($this->data)
            ->encoding(new Encoding('UTF-8'))
            ->build();
        $dataUri = $result->getDataUri();
        return $dataUri;
    }
}