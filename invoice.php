<?php
//$_POST["Customer_id"];
//$_POST["Invoice_id"];

//Data Retreival/////Ek sal hier n query op die DB doen

$email = "ehattingh@gmail.com";

//Generate invoice & PDF/////////////////////
//Hierdie is eintlik maar net n stuk html wat jy kan gebruik om te develop ek sal css later doen

echo 
"<div>Invoice"
     ."<div>From"
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
 . "</div>";
//Send invoice////////////////////////Hierdie is jou gedeelte



?>
