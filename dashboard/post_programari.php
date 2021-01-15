<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/appoints.inc.php');
$navbar -> title = TITLE_APPOINTMENTS;




if (strpos($_POST['phoneoremail'], '@') == TRUE) {
  $array_add_client['email'] = $_POST['phoneoremail'];
  $array_add_client['phone'] = "0";
  $array_add_client['nume_client'] = $_POST['name'];
  $array_add_client['id_companie'] = $company_data-> id_companie;
  echo "Added with email method";
}else {
  $array_add_client['phone'] = $_POST['phoneoremail'];
  $array_add_client['email'] = "0";
  $array_add_client['nume_client'] = $_POST['name'];
  $array_add_client['id_companie'] = $company_data-> id_companie;
  echo "Added with phone";
}
if ($job->existClient($array_add_client['email'], $array_add_client['phone']) == false) {
  $job->postClient($array_add_client);
  $client= $job->existClient($array_add_client['email'], $array_add_client['phone']);
  $array_add_client['id_client']= $client-> id_client ;
  $array_add_client['id_reprezentant']= $_POST['reprezentant'];
  $array_add_client['start_programare']= $_POST['start_sedinta'];
  $array_add_client['end_programare']= $_POST['end_sedinta'];
  $array_add_client['info']= $_POST['detalii_programare'];
  $job->postAppoint($array_add_client);

} else {
  $client= $job->existClient($array_add_client['email'], $array_add_client['phone']);
  $array_add_client['id_client']= $client-> id_client ;
  $array_add_client['id_reprezentant']= $_POST['reprezentant'];
  $array_add_client['start_programare']= $_POST['start_sedinta'];
  $array_add_client['end_programare']= $_POST['end_sedinta'];
  $array_add_client['info']= $_POST['detalii_programare'];
  $job->postAppoint($array_add_client);
}

 ?>
