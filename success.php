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
                    <li><a href="login.php">Asesores</a></li>
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

            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <div class="content-page page-500 text-center">

                        <img alt="" style="margin-top: -45px; margin-left: auto; margin-right: auto; height: 20%; width: 20%;" src="assets/pages/img/works/success.png" >

                        <h2 style="color: #44b1c1">
                            <strong>¡Solicitud enviada correctamente!</strong>
                        </h2>

                       <div class="details">
                            <h3 class="text-center">Tu solicitud ha sido enviada con éxito.</h3>
                        <p>
                            Favor de dirigirte con el asesor de tesis en cuestión para realizar o agendar una entrevista.
                        <p class="text-center" style="margin-top: -15px; margin-bottom: -10px;">
                            Esa entrevista será requisito para poder asignarle el tema de tesis.
                        </p>

                       </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END SIDEBAR & CONTENT -->

            <div class="row margin-bottom-60">
                <div class="col-lg-4 col-lg-offset-4 text-center margin-bottom-40" style="margin-top: -50px">
                    <button onclick="window.location.href='/Thesis-Selecter'" class="btn btn-primary">¡Entendido!</button>
                </div>
            </div>

        </div>
    </div>

    <!-- BEGIN PRE-FOOTER -->
        <?php include('footer.php'); ?>
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
