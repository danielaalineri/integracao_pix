<?php

require __DIR__.'/vendor/autoload.php';

use \App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

//INSTÂNCIA PRINCIPAL DO PAYLOAD PIX
$obPayload = (new Payload)->setPixKey('12345678900')
                          ->setDescription('PAGAMENTO DO PEDIDO 1234')
                          ->setMerchantName('Daniela A')
                          ->setMerchantCity('SAO PAULO')
                          ->setAmount(100.00)
                          ->setTxid('DANIDEV1234'); 
//CÓDIGO DE PAGAMENTO PIX
$payloadQrCode = $obPayload->getPayload();

//QR CODE
$obQrCode = new QrCode($payloadQrCode);

//IMAGEM DO QR CODE
$image =(new Output\Png)->output($obQrCode,400);

header('Content-Type: image/png');
echo $image;

