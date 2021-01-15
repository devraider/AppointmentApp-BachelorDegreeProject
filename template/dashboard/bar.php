<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title><?php echo $title; ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="../template/dashboard/bar-style.css" type="text/css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/moment@2.22.1/min/moment-with-locales.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-touchswipe@1.6.18/jquery.touchSwipe.min.js"></script>
      <script src="http://paulcristea.xyz/tests/jquery-calendar-bs4-master/src/js/jquery-calendar.js"></script>
      <link rel="stylesheet" href="http://paulcristea.xyz/tests/jquery-calendar-bs4-master/src/css/jquery-calendar.css ">
      <?php echo $html_creator_heads;?>
  </head>
  <body>

    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" style="padding-top: 20px;" href="./"><?php echo $easyappointment; ?>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" title="This is a tooltip."  href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li name="reprezentanti"><a href="./profile.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="./changepwd.php"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="../login.php?logout=1"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-book"></i>  Programari<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse ">
                        <li><a href="./representative.php" name="Reprezentant"><i class="fa fa-fw fa-user-plus "></i>  Rerezentant</a></li>
                        <li><a href="./appointments.php" name="Programare Noua"><i class="fa fa-calendar "></i>  Programare Noua</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-envelope-o"></i>  EMAIL<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="./create_email.php" name="Creare Email Template"><i class="fa fa-angle-double-right"></i>  Creare Email Template</a></li>
                        <li><a href="./send_camp_email.php" name="Trimitere Campanie Emails"><i class="fa fa-paper-plane-o"></i>  Trimitere Campanie</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-mobile"></i>  SMS<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="./create_sms.php" name="Creare SMS Template"><i class="fa fa-angle-double-right"></i>  Creare SMS Templeate</a></li>
                        <li><a href="./send_camp_sms.php" name="Trimitere Campanie SMS"><i class="fa fa-paper-plane-o"></i>  Trimitere Capanie</a></li>
                    </ul>
                </li>
                <li>
                    <a href="./status.php" name="Status"><i class="fa fa-fw fa-filter"></i> Status</a>
                </li>
                <li>
                    <a href="./faq.php" name="Contact"><i class="fa fa-fw fa-question-circle"></i> Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well well-sm" id="content">
                    <?php echo $breadcrumb;?>
                </div>

              </div>
            </div>
            <script>
            $(document).ready(function(){
              console.log(document.title);
              switch(document.title) {
                case "Reprezentant" :
                case "Programare Noua":
                      $("ul #submenu-1").prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
                        $("ul #submenu-1").addClass('in');
                        $("a[name='"+document.title+"']").addClass('select')
                  break;
                  case "Creare Email Template" :
                  case "Trimitere Campanie Emails":
                        $("ul #submenu-2").prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
                          $("ul #submenu-2").addClass('in');
                          $("a[name='"+document.title+"']").addClass('select')
                  break;
                  case "Creare SMS Template" :
                  case "Trimitere Campanie SMS":
                        $("ul #submenu-3").prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
                          $("ul #submenu-3").addClass('in');
                          $("a[name='"+document.title+"']").addClass('select');
                  break;
                  case "Status" :
                  case "Contact":
                      $("a[name='"+document.title+"']").addClass('select');
                  break;
                default:
              }
            })
            </script>
