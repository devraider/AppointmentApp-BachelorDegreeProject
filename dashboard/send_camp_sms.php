<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/send_camp_sms.inc.php');
$navbar -> title = TITLE_SENDSMS;

$content-> sms_details= $job->getSMS($company_data-> id_companie);

echo $navbar.$content;






 ?>
