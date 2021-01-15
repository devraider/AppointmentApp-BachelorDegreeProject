<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/profile.inc.php');

    $navbar -> title = TITLE_EDIT_PROFILE;
    $content -> company_data  = $company_data;
    // echo $navbar;
    if (isset($_POST['edit'])) {
      $data = array();
      $data['id']= $company_data -> id_companii;
      $data['email']=$_POST['email'];
      $data['cname']=$_POST['cname'];
      $data['adress']=$_POST['adress'];
      $data['ph']=$_POST['ph'];
      $data['cactivity']=$_POST['cactivity'];
      if (!empty($data['email']) && !empty($data['cname']) && !empty($data['adress']) && !empty($data['ph']) && !empty($data['cactivity'])) {
        $job -> updateCompany($data);
        $content->smtgwrong = $job -> alerts('Ai facut update cu succes');

    } else {
        $content->smtgwrong = $job -> alerts('Ai lasat ceva necompletat','warning');

      }
    }
    // echo $navbar.$content;
    echo $navbar. $content;
 ?>
