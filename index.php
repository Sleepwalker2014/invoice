<?php
require_once('vendor/autoload.php');
require_once('InvoiceHandler.php');

$invoiceData['companyName'] = 'Softwaremanufaktur Coreosoft';
$invoiceData['companyOwner'] = 'Marcel Roa';
$invoiceData['companyStreet'] = 'Haller Str.';
$invoiceData['companyHouseNumber'] = '8';
$invoiceData['companyZipCode'] = '16515';
$invoiceData['companyCity'] = 'Oranienburg';

$invoiceData['receiverName'] = 'Max Musterkerl';
$invoiceData['receiverStreet'] = 'Musterstraße';
$invoiceData['receiverHouseNumber'] = '1k';
$invoiceData['receiverZipCode'] = '11111';
$invoiceData['receiverCity'] = 'Musterstadt';

$invoiceData['iban'] = '12345678';
$invoiceData['bic'] = 'WELADED1XXX';

$loader = new Twig_Loader_Filesystem('xml');
$twig = new Twig_Environment($loader);

$return = null;
$output = [];

$invoiceHandler = new InvoiceHandler();

$renderedInvoice = $invoiceHandler->getRenderedInvoice($twig, $invoiceData);

$invoiceHandler->saveRenderedInvoideToFile($renderedInvoice);
header('Content-Type: application/pdf');
echo file_get_contents('tmp/tmp.pdf');

exec("fop-2.1/fop tmp/tmp.fo tmp/tmp.pdf", $output, $return);
?>