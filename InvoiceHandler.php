<?php

/**
 * Created by PhpStorm.
 * User: marcel
 * Date: 09.03.17
 * Time: 15:57
 */
class InvoiceHandler {

    /**
     * InvoiceHandler constructor.
     */
    public function __construct () {
    }

    public function getRenderedInvoice (Twig_Environment $twig, $invoiceData) {
        return $twig->render('invoice.fo.twig', $invoiceData);
    }

    public function saveRenderedInvoideToFile ($renderedInvoice) {
        return file_put_contents('tmp/tmp.fo', $renderedInvoice);
    }
}