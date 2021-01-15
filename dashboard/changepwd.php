<?php
include "../include/page_set.php";
$content = new Template('../template/dashboard/changepwd.inc.php');
$navbar -> title = TITLE_EDIT_PASS;

if (isset($_POST['edit'])) {
  if ($_POST['newpass'] == $_POST['renewpass']) {
  if (password_verify($_POST['oldpass'], $company_data -> password) ) {
    if ($job -> updatePassword( password_hash($_POST['newpass'], PASSWORD_DEFAULT), $company_data -> id_companii) ) {
      $content->smtgwrong = $job -> alerts('Ai modificat cu succes parola!');
    } else {
      $content->smtgwrong = $job -> alerts('Modificarea nu a avut succes!', 'danger');
    }
  } else {
    $content->smtgwrong = $job -> alerts('Parola cea veche este gresita', 'warning');
  }

} else {
  $content->smtgwrong = $job -> alerts('Noua parola introdusa nu corespunde cu cealata!','warning');
}
}


echo $navbar.$content;
 ?>
