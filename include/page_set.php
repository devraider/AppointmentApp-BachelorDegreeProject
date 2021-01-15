<?php
session_start();
include 'dash.init.php';
include 'config.php';
$email = $_SESSION["email"];
$job = new Jobs;
$navbar = new Template('../template/dashboard/bar.php');
$breadcrumb = new Template('../template/dashboard/breadcrumb.php');
$navbar -> breadcrumb =  $breadcrumb;
$navbar -> easyappointment =  SITE_TITLE;
$company_data = $job -> loginCheck($email);
// Redirect daca nu exista sesiune
function secure($email){
  if ($email == $company_data -> email_companie){
    header("Location: ../login.php");
  }
}
secure($email);
////////
  ?>
