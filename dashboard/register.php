<?php
include_once 'include/init.php';
  $page = new Template('template/register.inc.php');
  $register = new Jobs;
  $page -> title = 'EasyAppoiments';


if (isset($_POST['register'])) {
  $data = array();
  $data['email']=$_POST['email'];
  $data['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);
  $data['cname']=$_POST['cname'];
  $data['adress']=$_POST['adress'];
  $data['ph']=$_POST['ph'];
  $data['cactivity']=$_POST['cactivity'];
  if (!empty($data['email']) && !empty($data['password']) && !empty($data['cname']) && !empty($data['adress']) && !empty($data['ph']) && !empty($data['cactivity'])) {
  if ($register->checkExist($data['email'])) {
  $register->registerCompany($data);
  $page->smtgwrong = "Succes :) Return to login!";
  echo $page;
}else {
  $page->smtgwrong = "User already exist!";
  echo $page;
}
  } else {
    $page->smtgwrong = "Sorry you forgot someting";
    echo $page;
  }
}else {
  echo $page;
}









 ?>
