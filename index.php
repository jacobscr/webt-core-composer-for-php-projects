<?php
require_once 'vendor/autoload.php';
use Jacob\WebtCoreComposerForPhpProjects\QRcode;

// Initialisiere die QR-Code-Daten und die Data URI
$qrCodeData = '';
$dataUri = '';

// Überprüfe, ob das Formular gesendet wurde
if (isset($_POST['generateQR'])) {
    $qrCodeData =  $_POST['qrCodeData'];

    // Nur QR-Code generieren, wenn Daten vorhanden sind
    if (!empty($qrCodeData)) {
        $QRcode = new QRcode('tel:' . $qrCodeData);
        $dataUri = $QRcode->generate();
    }
}
?>

<html>
<head>
    <title>QR Code Generator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <h1 class="text-5xl text-center mb-6">QR Code Generator</h1>
    
    <!-- Eingabefeld für den QR-Code-Inhalt -->
    <form method="POST" class="mb-4">
        <div class="mb-4">
            <label for="qrCodeData" class="block text-gray-700 text-sm font-bold mb-2">Telefonnummer eingeben:</label>
            <input type="number" name="qrCodeData" id="qrCodeData" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex justify-center items-center">
            <button type="submit" name="generateQR" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">QR-Code generieren</button>
        </div>
    </form>
    
    <!-- Zeige den QR-Code an, wenn er generiert wurde -->
    <?php if (!empty($dataUri)) : ?>
        <img src="<?= $dataUri ?>" class="mx-auto">
    <?php endif; ?>
</body>
</html>
