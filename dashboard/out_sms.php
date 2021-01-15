<?php
include "../include/page_set.php";

function sendSMS($nrs, $company_data, $campanie, $job){
  $count = 0;
  foreach ($nrs as $nr  ) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.twilio.com/2010-04-01/Accounts/ACaa695231026d3cb3a13d4ddbaaa7c880/Messages.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "To=+4".$nr-> phone."&From=+12183963589&Body=".urlencode($campanie-> content_sms).' ('.$company_data -> nume_companie).')';
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, 'ACaa695231026d3cb3a13d4ddbaaa7c880' . ':' . 'c0bba2034578165665d906b70919f6aa');

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $count +=  1;
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }


    print_r($result);
  }
  $content['id_companie']= $company_data-> id_companie;
  $content['sms']=  $count;
  $content['email']=  0;
  $job-> updateSending($content);
  // echo $count;
}
if (isset($_POST['id'])) {
  $campanie= $job-> getSMSById(intval($_POST['id']));
  $nrs= $job ->getAllSMS($company_data-> id_companie);
  sendSMS($nrs, $company_data, $campanie, $job);
  // print_r($mails);
  echo "sms sent";
}else {
  $all_appoints = $job -> getAllAppoints();
  // print_r($all_appoints);
  foreach ($all_appoints as $appoint) {
    $start = strtotime($appoint-> start_programare);
    $now  =  time();
    $data = [];
    if (($start - $now) == 14400) {
      $data+= [$appoint-> phone => $appoint-> id_companie];
    }
  }
 $campanie = $job-> getSMSById(1);
 foreach ($data as $nr => $id_companie) {
   $nrs[] = $nr;
   sendSMS($nrs, $job-> getCompany($id_companie), $campanie, $job);
  }

}
















 ?>
