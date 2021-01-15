<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/sms_create.inc.php');
$navbar -> title = TITLE_TEMPSMS;
echo $navbar.$content;
 ?>
