<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="./template/login.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
  <body>
    <div class="sidenav bg-dark" >
             <div class="login-main-text">
                <h2>Application<br> Login Page</h2>
                <p>Login or register from here to access.</p>
             </div>
          </div>
          <div class="main">
             <div class="col-md-6 col-sm-12">
                <div class="login-form">
                  <p class="text-warning">  <?php echo $smtgwrong ; ?></p>
                   <form method="post">
                      <div class="form-group">
                         <label>User Name</label>
                         <input type="text" class="form-control" name="email" placeholder="Email" >
                      </div>
                      <div class="form-group">
                         <label>Password</label>
                         <input type="password" class="form-control" name="password" placeholder="********">
                      </div>
                      <div class="form-group">
                         <label>Nume Companie</label>
                         <input type="text" class="form-control" name="cname" placeholder="SC ADMIN SA">
                      </div>
                      <div class="form-group">
                         <label>Adresa</label>
                         <input type="text" class="form-control" name="adress" placeholder="Str Rasaritului 54b, Bucuresti">
                      </div>
                      <div class="form-group">
                         <label>Telefon</label>
                         <input type="text" class="form-control" name="ph" placeholder="07******342">
                      </div>
                      <div class="form-group">
                         <label>Activitate Companie</label>
                         <input type="text" class="form-control" name="cactivity" placeholder="Administrarea Drumurilor">
                      </div>
                      <button type="submit" class="btn btn-secondary" name="register" value="register">Register</button>
                      <a href="./login.php">Have already an account? Log in!</a>
                   </form>
                </div>
             </div>
          </div>

  </body>
</html>
