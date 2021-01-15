<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/send_camp_email.inc.php');
$navbar -> title = TITLE_SEND;

$content-> newsletter_details= $job->getNewsletters($company_data-> id_companie);

// echo process_data_alan($x) ;
echo $navbar.$content;
// $command = 'swaks -t cristeapaul.2015@gmail.com -f adasd@dasa.com -s gmail-smtp-in.l.google.com ';
//
// print_r($status);




 ?>
