<?php

require 'vendor/autoload.php';
use mikehaertl\wkhtmlto\Pdf;

// http://localhost:8000/invoice.php?invoice_id=INV2674984&customer_id=CUST1589
//Data Retreival/////Ek sal hier n query op die DB doen
$customer_id = $_GET["customer_id"];
$invoice_id = $_GET["invoice_id"];
$email_to = "ehattingh@gmail.com";
$email_from = "ehattingh@gmail.com";
$file_path = $invoice_id. '_' . $customer_id . '.pdf';

// Generate HTML and convert to PDF
$pdf = new Pdf();
$pdf->addPage(
     "<html>"
        . "<body>"
            . "<div>Invoice " . $invoice_id
                . "<div>From"
                    . "<div class='detail'>From Name</div>"
                    . "<div class='detail'>From Details</div>"
                    . "<div class='detail'>From Address</div>"
                . "</div>"
                ."<div>To"
                    . "<div class='detail'>email</div>"
                    . "<div class='detail'>contact number</div>"
                    . "<div class='detail'>physical address</div>"
                    . "<div class='detail'>medical aid</div>"
                    . "<div class='detail'>number and main memmber</div>"
                    . "<div class='detail'>ID number</div>"
                . "</div>"
                ."<table>Items"
                    ."<tr>"
                        . "<th class='detail'>Description</th>"
                        . "<th class='detail'>Quantity</th>"
                        . "<th class='detail'>Price</th>"
                        . "<th class='detail'>Total</th"
                    ."</tr>"
                    ."<tr>"
                        ."<td>Test item</td>"
                        ."<td>2</td>"
                        ."<td>10</td>"
                        ."<td>20</td>"
                    . "</tr>"
                    ."<tr>"
                        ."<td>Test item 2</td>"
                        ."<td>2</td>"
                        ."<td>20</td>"
                        ."<td>40</td>"
                    . "</tr>"
                . "</table>"
                ."<div>Message"
                    . "<div class='detail'>Footer van die Invoice</div>"
                ."</div>"
            . "</div>"
        . "</body>"
    . "</html>"
);

// Save the pdf to the temp directory
if (!$pdf->saveAs($file_path)) {
    // an error has occurred notify the user
    echo $pdf->getError();
    die();
} else {   
    // The pdf has successfully been created, send the email with the pdf attached
    $sendgrid = new SendGrid('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');
    $email = new SendGrid\Email();
    $email
        ->addTo($email_to)
        ->setFrom($email_from)
        ->setSubject('Invoice: ' . $invoice_id . ' for customer: ' . $customer_id)
        ->setText('Hi, Please find attached your requested invoice.')
        ->setHtml('Hi, <br /><br />Please find attached your requested invoice.')
        ->addAttachment(__DIR__ . '\\' . $file_path);

    try {
        // Send the email
        $sendgrid->send($email);
        // Delete the pdf from the tmp dir
        unlink($file_path);
    } catch(\SendGrid\Exception $e) {
        // The email could not be sent, notify the user
        echo $e->getCode();
        foreach($e->getErrors() as $er) {
            echo $er;
        }
    }    
}


?>
