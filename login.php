<?php
    include_once 'assets/code/include/db_connection.php';
    include_once 'assets/code/include/db_functions.php';
    require_once("config.php");

    session_start();

    if (isset($_SESSION['researcher']))
    {
        header("Location: error-permission.php");
    }else if ($saml->isAuthenticated())
    {
      header("Location: error-permission.php");
    }

    if (isset($_POST['btnLogin']))
        {
            if (empty($_POST['email'])) {
                    $_SESSION['empty_email_msg'] = "Ingrese su correo electrónico";
                    header("Location: login.php");
            } else if (empty($_POST['password'])) {
                    $_SESSION['empty_pass_msg'] = "Ingrese su contraseña";
                    header("Location: login.php");
            } else {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $researcher = login($email, $password);

                    if ($researcher != false) {
                            $_SESSION['researcher'] = $researcher;
                            header("Location: /Thesis-Selecter");
                    } else {
                            $_SESSION['error'] = "Correo electrónico o contraseña incorrectos";
                            header("Location: error-login.php");
                    }
            }
        }

        if (isset($_POST['btnLoginAdmin']))
            {
                if (empty($_POST['emailAdmin'])) {
                        $_SESSION['empty_email_msg'] = "Ingrese su correo electrónico";
                        header("Location: login.php");
                } else if (empty($_POST['passwordAdmin'])) {
                        $_SESSION['empty_pass_msg'] = "Ingrese su contraseña";
                        header("Location: login.php");
                } else {
                        $emailAdmin = $_POST['emailAdmin'];
                        $passwordAdmin = $_POST['passwordAdmin'];
                        $administrador = loginAdmin($emailAdmin, $passwordAdmin);

                        if ($administrador != false) {
                                $_SESSION['researcher'] = $administrador;
                                header("Location: administrador.php");
                        } else {
                                $_SESSION['error'] = "Correo electrónico o contraseña incorrectos";
                                header("Location: error-login.php");
                        }
                }
            }
?>
<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jorge Luis Aguirre Martínez & Ing. Alan Ulises Montes Rodríguez
-- © October 15, 2017 Derechos Reservados, Universidad de Colima.
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
            <a class="site-logo" href="/Thesis-Selecter"><img src="assets/corporate/img/logos/logo-theses-turquoise.png" alt="Tesis Ontology"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation pull-right font-transform-inherit">
                <ul>
                    <li><a href="/Thesis-Selecter">Tesis</a></li>
                    <li class="active"><a href="login.php">Asesores</a></li>
                    <li><a href="about.php">Sobre Nosotros</a></li>
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
                <li><a href="/Thesis-Selecter">Inicio</a></li>
                <li class="active">Iniciar sesión</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-60">
                <!-- BEGIN SIDEBAR -->
                <div class="sidebar col-md-3 col-sm-3">
                    <ul class="list-group margin-bottom-25 sidebar-menu">
                        <li class="list-group-item clearfix"><a href="javascript:;"><i class="fa fa-angle-right"></i> Iniciar sesión</a></li>
                        <!--<li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Restaurar contraseña</a></li>-->
                    </ul>
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-9">
                    <h1>Iniciar sesión</h1>
                    <div class="content-form-page">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <form class="form-horizontal form-without-legend" role="form" method="post">
                                    <div class="form-group">
                                        <label for="email" class="col-lg-4 control-label">Correo electrónico <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email" name="email" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-lg-4 control-label">Contraseña <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="password" class="form-control" id="password" name="password" required="required">
                                        </div>
                                    </div>
                                    <!--
                                    <div class="row">
                                        <div class="col-lg-8 col-md-offset-4 padding-left-0">
                                            <a href="#">¿Se te olvidó tu contraseña?</a>
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                            <button type="submit" name="btnLogin" class="btn btn-primary">Iniciar sesión</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-4 pull-right margin-bottom-48">
                                <div class="form-info">
                                    <h2>Si quiere iniciar sesión como <em>Administrador</em></h2>
                                    <p>Ingrese pulsando el botón acceder usando su correo electrónico y contraseña.</p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginAdministrador">Acceder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

    <?php include('assets/pages/modals/Administrator/login-administrador.php')?>

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
