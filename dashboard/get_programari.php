<?php
include "../include/page_set.php";
// echo $navbar.$content;
$x = json_encode($job->getAppoints($company_data-> id_companie));
echo ($x);


// SELECT programari.*, reprezentanti_companie.*   FROM programari p INNER JOIN reprezentanti_companie  r ON p.id_reprezentant = r.id_reprezentant

 ?>
