<?php
include "../include/page_set.php";


$content['id_companie'] = $company_data-> id_companie;
$content['nume_newsletter'] = $_POST['newsletter_name'];
$content['subject_newsletter'] = $_POST['newsletter_subject'];
$content['content_newsletter'] = $_POST['editordata'];

$job->postNewsletters($content);
