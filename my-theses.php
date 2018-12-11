<?php
    include_once 'assets/code/include/db_functions.php';
    include_once 'assets/code/researcher.php';
    include_once 'assets/code/thesis.php';

    session_start();

    if (!isset($_SESSION['researcher']))
    {
        header("Location: error-permission.php");
    }

    $theses = $_SESSION['researcher']->get_all_theses();
    $rowcount = count($theses);
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
                    <li class="active"><a href="my-theses.php">Mis Tesis</a></li>
                    <li><a href="requests.php">Solicitudes</a></li>
                    <li class="dropdown">
                        <profile>
                            <div class="testimonials-v1 dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                                <div class="carousel-info">
                                    <img class="pull-left" src="<?php echo $_SESSION['researcher']->get_image_profile();?>" alt="avatar-small">
                                </div>
                            </div>
                        </profile>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#profileTeacher"><?php echo $_SESSION['researcher']->get_full_name(); ?></a></li>
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
                <li><a href="/thesis-selecter">Inicio</a></li>
                <li class="active">Mis Tesis</li>
            </ul>
            <div class="row margin-bottom-124">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12 ">
                    <h1>Mis Tesis</h1>
                    <div class="row text-right ">
                      <button type="button" class="btn btn-primary" style="margin-right: 1.5%;" name="button" data-toggle="modal" data-target="#addThesis">Agregar tesis</button>

                    </div>
                    <div class="content-page">
                        <div class="row">


                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>

            <!-- CONTENT -->
            <div class="content">
                <div class="container-fluid">
                    <form action="tabs.php" role="form" method="post" id="search_form">
                        <div class="row">
                            <section class="">
                                <div class="row">
                                    <!-- LISTING -->
                                    <?php if(isset($theses) && count($theses) && $rowcount > 0) : $i = 0; ?>
                                        <?php foreach ($theses as $thesis) : ?>
                                            <article class="col-lg-3 col-md-4 col-sm-6 col-12">
                                                <div class="pricing hover-effect">
                                                    <div class="pricing-head">
                                                        <h3>Tesis
                                                        <span>
                                                            <?php echo $thesis->get_status(); ?>
                                                        </span>
                                                        </h3>
                                                        <span>
                                                        <figure>
                                                            <a><img style="height: auto; width:100%; padding-top: 10px;" src="<?php echo $thesis->get_image(); ?>" alt="<?php echo $thesis->get_name(); ?>" /></a>
                                                        </figure>
                                                        </span>
                                                        </h4>
                                                    </div>
                                                    <div class="pricing-footer">
                                                        <p class="thesis-name">
                                                            <?php echo $thesis->get_name(); ?>
                                                        </p>
                                                        <button type="submit" name="btnThesis" value="<?php echo $thesis->get_id(); ?>" class="btn btn-primary">Ver más</button>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php $i++; endforeach; ?>
                                    <?php endif; ?>
                                    <!-- /.LISTING -->
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.CONTENT -->

        </div>
    </div>
    <?php include('profile-teacher.php') ?>
    <?php include('add-thesis.php') ?>

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
