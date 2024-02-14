<?php
require_once 'vendor/autoload.php';
use Jacob\WebtCoreComposerForPhpProjects\QRcode;

$qr = new QRcode('tel: +43 1 22 33 444');
$dataUri = $qr->generate();

?>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex justify-center items-center min-h-screen">
        <?php echo '<img src="' . $dataUri . '">'; ?>
    </div>
</body>
</html>