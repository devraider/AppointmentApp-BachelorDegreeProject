<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/status.inc.php');
$navbar -> title = TITLE_STATUS;
$navbar -> html_creator_heads  = '
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>';

echo $navbar.$content;





 ?>
