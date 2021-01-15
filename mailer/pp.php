<?php


require("smtp.php");
require("sasl.php");
$smtp=new smtp_class;

$from="admin@paulcristea.xyz";
$to="cristeapaul.2015@gmail.com";


$smtp->host_name="smtp.zoho.eu";
$smtp->host_port=465;
$smtp->ssl=1;
$smtp->start_tls=0;
$smtp->localhost="";
$smtp->timeout=10;
$smtp->data_timeout=0;
$smtp->debug=1;
$smtp->html_debug=0;
$smtp->user="admin@paulcristea.xyz";
$smtp->password="NOplease11";


$smtp->SendMessage($company_data->email_companie,array($mail->email),array(
  "Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z"),
    "To: $to",
    'From: '.$company_data->nume_companie.' <'.$company_data->email_companie.">",
    'Reply-To:' . $from  ,
    'Content-Type: text/html; charset=utf8' ,
    'X-Mailer: PHP/' . phpversion();
    'X-Sender: webmaster@paulcristea.xyz' ,
    'Subject: ' .  $campanie-> subject_newsletter

  ), $campanie-> content_newsletter);



---






 ?>
