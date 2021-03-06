<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jorge Luis Aguirre Martínez & Ing. Alan Ulises Montes Rodríguez
-- © November 2, 2017 Derechos Reservados, Universidad de Colima.
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
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="assets/pages/css/components.css" rel="stylesheet">
    <link href="assets/corporate/css/style.css" rel="stylesheet">
    <link href="assets/pages/css/gallery.css" rel="stylesheet">
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
          <a class="site-logo" href="/Thesis-Selecter"><img src="assets/corporate/img/logos/logo-theses-turquoise.png" alt="Thesis Selecter"></a>
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
            <ul class="breadcrumb margin-bottom-3">
                <li><a href="/Thesis-Selecter">Inicio</a></li>
                <li><a href="login.php">Iniciar sesión</a></li>
                <li class="active">Error</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-50">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="content-page page-404">
                        <div class="number">
                            404
                        </div>
                        <div class="details">
                            <h3>Oops!  Error al intentar entrar al sistema.</h3>
                            <p>
                                Es probable que el usuario y/o contraseña que introdujo,<br> no sean correctas.
                                <a href="login.php" class="link">Regresa al inicio de sesión</a> y vuelve a intentar.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->
        </div>
    </div>

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

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
