<?php
require_once('vendor/autoload.php');
require_once('InvoiceHandler.php');
require_once('PositionHolder.php');
require_once('Position.php');

$invoiceData['companyName'] = 'Softwaremanufaktur Coreosoft';
$invoiceData['companyOwner'] = 'Marcel Roa';
$invoiceData['companyStreet'] = 'Haller Str.';
$invoiceData['companyHouseNumber'] = '8';
$invoiceData['companyZipCode'] = '16515';
$invoiceData['companyCity'] = 'Oranienburg';

$invoiceData['companyMobile'] = '(0176) 97899006';
$invoiceData['companyTelephone'] = '(03301) 6769319';
$invoiceData['companyEmail'] = 'marcel.roa@gmx.de';
$invoiceData['companyWeb'] = 'www.coreosoft.de';

$invoiceData['receiverName'] = 'Max Musterkerl';
$invoiceData['receiverTitle'] = 'Herr';
$invoiceData['receiverStreet'] = 'Musterstraße';
$invoiceData['receiverHouseNumber'] = '1k';
$invoiceData['receiverZipCode'] = '11111';
$invoiceData['receiverCity'] = 'Musterstadt';

$invoiceData['invoiceNumber'] = '01/01/17/123';
$invoiceData['invoiceDate'] = '01.01.2017';

$invoiceData['bankName'] = 'Mittelbrandenburgische Sparkasse Potsdam';
$invoiceData['iban'] = '12345678';
$invoiceData['bic'] = 'WELADED1XXX';

$invoiceData['taxNumber'] = '048/815/0815';
$invoiceData['taxId'] = '01183525532515';

$positionHolder = new PositionHolder();

$positionHolder->addPosition(new Position('Qualitätssicherung',
                                          'Erstellen von Unittests, sowie von Testdokumentationen',
                                          146.67));

$positionHolder->addPosition(new Position('Anforderungsermittlung',
                                          'Ermittlung von Anforderung und Erstellung eines Lastenheftes',
                                          435.43));

$positionHolder->addPosition(new Position('Anforderungsermittlung',
                                          'Ermittlung von Anforderung und Erstellung eines Lastenheftes',
                                          435.43));

$positionOutput = $positionHolder->getPositionOutput();


$invoiceData['positions'] = $positionHolder->getPositionOutput();
$invoiceData['totalPrice'] = '453,34';


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