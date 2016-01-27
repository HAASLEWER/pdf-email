<?php

require 'vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;

// You can pass a filename, a HTML string or an URL to the constructor
//invoice.php?invoice_id=INV2674984&customer_id=CUST1589
$pdf = new Pdf();
$pdf->addPage('/invoice.php');

// On some systems you may have to set the path to the wkhtmltopdf executable
// $pdf->binary = 'C:\...';

if (!$pdf->saveAs('page.pdf')) {
    echo $pdf->getError();
}

?>