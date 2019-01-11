<?php
  include_once 'assets/code/include/db_connection.php';
  include_once 'assets/code/include/db_functions.php';
  session_start();
  if (!isset($_SESSION['researcher']))
  {
      header("Location: error-permission.php");
  }
  if (isset($_POST['oldPwd'], $_POST['newPwd'], $_POST['confPwd']))
  {
    if (!empty($_POST['oldPwd'] && $_POST['newPwd'] && $_POST['confPwd']))
    {
      if ($_POST['newPwd']==$_POST['confPwd'])
      {
        global $connection;
        $action = $_SESSION['researcher']->get_email();
        $sql = "SELECT ResearcherID, EmailPassword FROM researcher where EmailAddress = '$action'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
             while($row = $result->fetch_assoc()) {
               $researcher = $row['ResearcherID'];
               $password = $row['EmailPassword'];
          }
        }
        if ($password==$_POST['oldPwd'])
        {
          $pwd = $_POST['newPwd'];
          $sql = "UPDATE researcher SET EmailPassword='$pwd' WHERE ResearcherID=$researcher";
          if ($connection->query($sql) === TRUE) {
             header('location: success_password.php');
             } else {
               header('location: error_password.php');

            }
           $connection->close();
        } else {
          header('location: error_password.php');
        }

      }else {
        header('location: error_password.php');
      }

    }else {
      header('location: error_password.php');
    }
  }
?>
<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jose Angel Torres Martinez
-- © December 20, 2018 Derechos Reservados, Universidad de Colima.
--
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
    <?php include('metadata.php'); ?>
    <link href='assets/corporate/img/logos/logo-favicon.png' rel='shortcut icon' type='image/png'>

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="assets/pages/css/components.css" rel="stylesheet">
    <link href="assets/corporate/css/style.css" rel="stylesheet">
    <link href="assets/corporate/css/style-responsive.css" rel="stylesheet">
    <link href="assets/corporate/css/themes/turquoise.css" rel="stylesheet" id="style-color">
    <link href="assets/corporate/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate">

    <!-- BEGIN TOP BAR -->
    <div class="pre-header" style="background-color: #3B829A;">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <img src="assets/corporate/img/logos/logo-telematica.png" class="color-img img-responsive" alt="Facultad de Telemática" style="margin-top: -8px"></a>
                </div>
                <!-- END TOP BAR LEFT PART -->
            </div>
        </div>
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container">
            <a class="site-logo" href="/thesis-selecter"><img src="assets/corporate/img/logos/logo-theses-turquoise.png" alt="Thesis Selecter"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation pull-right font-transform-inherit">
                <ul>
                    <li><a href="/thesis-selecter">Tesis</a></li>
                    <li><a href="my-theses.php">Mis Tesis</a></li>
                    <li><a href="requests.php">Solicitudes</a></li>
                    <li class="dropdown active">
                        <profile>
                            <div class="testimonials-v1 dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                                <div class="carousel-info">
                                    <img class="pull-left" src="<?php echo $_SESSION['researcher']->get_image_profile();?>" alt="avatar-small">
                                </div>
                            </div>
                        </profile>
                        <ul class="dropdown-menu">
                          <li><a href="javascript:void(0);" data-toggle="modal" data-target="#profileTeacher" ><?php echo $_SESSION['researcher']->get_full_name(); ?></a></li>
                            <li><a href="assets/code/session.php?logout=true">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                    <!-- BEGIN TOP SEARCH -->
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="javascript:void(0);">
                                <div class="input-group">
                                    <input type="text" placeholder="Buscar" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- END TOP SEARCH -->
                </ul>
            </div>
          <!-- END NAVIGATION -->
        </div>
    </div>
    <!-- Header END -->

    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li class="active">Cambiar Contraseña</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-60 ">
                <!-- BEGIN CONTENT -->
                <form method="post" class="form-horizontal form-without-legend" action="change_password.php">
                  <div class="col-md-12 margin-bottom-50">
                      <h2>Cambiar Contraseña</h2>
                  </div>
                    <div class="form-group col-sm-12">
                        <label for="oldPwd" class="col-lg-4 control-label">Contraseña actual: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="oldPwd" name="oldPwd" required="required">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="newPwd" class="col-lg-4 control-label">Nueva contraseña: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="newPwd" name="newPwd" required="required">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="confPwd" class="col-lg-4 control-label">Confirmar nueva contraseña: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="confPwd" name="confPwd" required="required">
                        </div>
                    </div>
                    <div class="row text-right col-sm-12">
                        <button type="submit" class="btn btn-primary">Aplicar</button>
                        <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cerrar</button>
                    </div>
              </div>

            </div>
          </div>
        </form>
                <!-- END CONTENT -->
            <!-- END SIDEBAR & CONTENT -->
        <?php include('assets/pages/modals/Researcher/profile-teacher.php') ?>

    <!-- BEGIN PRE-FOOTER -->
        <?php include('footer-fixed.php'); ?>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initUniform();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
