<?php

include_once 'include/init.php';
  $page = new Template('template/login.inc.php');
  $page -> title = 'EasyAppoiments';
  $check_login = new Jobs;

if($_GET['logout'] == 1){
  session_start();
  session_unset();
  session_destroy();
}
$email =$_POST['email'];
$password =$_POST['password'];

if (isset($_POST['login'])) {
  if (!(empty($email)) && !(empty($password)) ) {
    $confirmation=$check_login->loginCheck($email, $password);
    if ($confirmation !== false) {
        if ($email == $check_login->loginCheck($email, $password)->email_companie && password_verify($password ,$check_login->loginCheck($email, $password)->password)) {
            session_start();
            $_SESSION["email"] = $email;
            header("Location: ./dashboard/");
        }else {
          $page -> smtgwrong = "Email or Password don't match! :(";
          echo $page;
        }
    }else {
    $page -> smtgwrong = "Email or Password don't match! :(";
    echo $page;
    }

  }else {
      $page -> smtgwrong = "Looks like you forgot something :(";
      echo $page;
  }


}else {

  echo $page;
}







 ?>
