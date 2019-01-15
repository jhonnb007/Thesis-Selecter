<?php
    include_once 'assets/code/thesis.php';
    include_once 'assets/code/researcher.php';

    session_start();

?>
<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jorge Luis Aguirre Martínez & Ing. Alan Ulises Montes Rodríguez
-- © November 1, 2017 Derechos Reservados, Universidad de Colima.
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

                <?php
                    if (isset($_SESSION['researcher']))
                    {?>
                        <?php
                            if (isset($_GET['thesis_tabs']))
                            {?>
                                <ul>
                                    <li><a href="/Thesis-Selecter">Tesis</a></li>
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
                            <?php
                            }
                            else
                            {?>
                                <ul>
                                    <li class="active"><a href="/Thesis-Selecter">Tesis</a></li>
                                    <li><a href="my-theses.php">Mis Tesis</a></li>
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
                            <?php
                            }
                        ?>
                    <?php
                    }
                    else
                    {?>
                        <ul>
                            <li class="active"><a href="/Thesis-Selecter">Tesis</a></li>
                            <li><a href="login.php">Asesores</a></li>
                            <li><a href="about.php">Sobre Nosotros</a></li>
                            <!-- BEGIN TOP SEARCH -->
                            <li class="menu-search">
                                <span class="sep"></span>
                                <i class="fa fa-search search-btn"></i>
                                <div class="search-box">
                                    <form action="javascript:void(0);">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <!-- END TOP SEARCH -->
                        </ul>
                    <?php
                    }
                ?>
            </div>
            <!-- END NAVIGATION -->
        </div>
    </div>
    <!-- Header END -->

    <div class="main">
        <div class="container">

        <?php
            if (isset($_GET['thesis_tabs']))
            {?>
                <ul class="breadcrumb">
                    <li><a href="/Thesis-Selecter">Inicio</a></li>
                    <li><a href="my-theses.php">Mis Tesis</a></li>
                    <li><a href="tabs.php">Detalle</a></li>
                    <li class="active">Resumen</li>
                </ul>
            <?php
            }
            else
            {?>
                <ul class="breadcrumb">
                    <li><a href="/Thesis-Selecter">Inicio</a></li>
                    <li><a href="/Thesis-Selecter">Tesis</a></li>
                    <li><a href="inside.php?thesis_id=<?php echo $_SESSION['thesis']->get_id();?>">Detalle</a></li>
                    <li class="active">Resumen</li>
                </ul>
            <?php
            }
        ?>

        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td colspan="2" style="text-align: center; ">
                        <h2><?php echo $_SESSION['thesis']->get_name();?></h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <div class="row margin-bottom-10 margin-top-10">
                            <div class="col-lg-4 col-lg-offset-4 gallery-item">
                                <a data-rel="fancybox-button" title="<?php echo $_SESSION['thesis']->get_name();?>" href="<?php echo $_SESSION['thesis']->get_image_in();?>" class="fancybox-button">
                                    <img alt="<?php echo $_SESSION['thesis']->get_name();?>" src="<?php echo $_SESSION['thesis']->get_image_in();?>" class="img-responsive">
                                    <div class="zoomix"><i class="fa fa-search"></i></div>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr colspan="2">
                    <td>
                        <p><?php echo $_SESSION['thesis']->get_summary();?></p>
                    </td>
                </tr>
                <tr>
            </tbody>
        </table>

        <?php
            if (isset($_GET['thesis_tabs']))
            {?>
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5 text-center padding-top-20 margin-bottom-40">
                        <button onclick="window.location.href='tabs.php'" class="btn btn-default">Regresar</button>
                    </div>
                </div>
            <?php
            }
            else
            {?>
                <div class="row">
                    <div class="col-sm-2 col-sm-offset-5 text-center padding-top-20 margin-bottom-40">
                        <button onclick="window.location.href='inside.php?thesis_id=<?php echo $_SESSION['thesis']->get_id();?>'" class="btn btn-default">Regresar</button>
                    </div>
                </div>
            <?php
            }
        ?>

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
<?php include('assets/pages/modals/Researcher/profile-teacher.php') ?>

<!-- END BODY -->
</html>
