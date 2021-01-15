<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/appoints.inc.php');
$navbar -> title = TITLE_APPOINTMENTS;
$content -> getAllRepresentants = $job->getAllRepresentants($company_data-> id_companie);
$navbar -> html_creator_heads  = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>';

echo $navbar.$content;




 ?>
