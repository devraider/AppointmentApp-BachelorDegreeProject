<?php
include "../include/page_set.php";


$content['id_companie'] = $company_data-> id_companie;
$content['nume_sms'] = $_POST['sms_name'];
$content['subject_sms'] = $_POST['sms_subject'];
$content['content_sms'] = $_POST['editordata'];

echo($job->postSMS($content));
