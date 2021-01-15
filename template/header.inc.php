<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="template/footer.css" rel="stylesheet" id="bootstrap-css">
    <!-- calnedar  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://paulcristea.xyz/tests/jquery-calendar-bs4-master/src/css/jquery-calendar.css ">

  <!-- end calendas -->
      <style>
      .nav > li { margin: 0 10px; }
      .navbar > a , .nav-link:hover{color: #dc3545}
      .navbar > a , .nav-link{color: #fff}
      .custom:hover {color: #fff;
        transition: 0.5s;  }

        }
      </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark " style="padding-top:  0 !important;padding-bottom:  0 !important;" >
      <a class="navbar-brand" href="/index.php"><?php echo $title; ?></a>


      <div class="navbar-collapse d-flex justify-content-end" >
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link btn-danger custom"  href="./login.php">Login/Register</a>

          </li>
        </ul>

      </div>
    </nav>
