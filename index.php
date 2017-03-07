<?php
    require_once ('vendor/autoload.php');

    $invoiceData['companyName'] = 'Softwaremanufaktur CoreoSoft';
    $invoiceData['companyStreet'] = 'Haller Str.';
    $invoiceData['companyHouseNumber'] = '8';
    $invoiceData['companyZipCode'] = '16515';
    $invoiceData['companyCity'] = 'Oranienburg';

    $invoiceData['receiverName'] = 'Max Mustermann';
    $invoiceData['receiverStreet'] = 'Musterstraße';
    $invoiceData['receiverHouseNumber'] = '1k';
    $invoiceData['receiverZipCode'] = '11111';
    $invoiceData['receiverCity'] = 'Musterstadt';

    $loader = new Twig_Loader_Filesystem('html');
    $twig = new Twig_Environment($loader);

    $pdf = new TCPDF();
    $pdf->AddPage();

    $html = $twig->render('invoice.twig.html', $invoiceData);

    exec('fop-2.1/fop xml/invoice.fo.twig tmp/tmp.pdf');

    $pdf->writeHTML($html);

    $pdf->Output('example_001.pdf', 'I');
?>