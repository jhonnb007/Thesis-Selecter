<?php
    session_start();

    if (isset($_SESSION['researcher']))
    {
        header("Location: error-permission.php");
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
            <a class="site-logo" href="/Thesis-Selecter"><img src="assets/corporate/img/logos/logo-theses-turquoise.png" alt="Thesis Selecter"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation pull-right font-transform-inherit">
                <ul>
                    <li><a href="/Thesis-Selecter">Tesis</a></li>
                    <li><a href="login.php">Asesores</a></li>
                    <li class="active"><a href="about.php">Sobre Nosotros</a></li>

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
                <li class="active">Sobre Nosotros</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-0">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Sobre Nosotros</h1>
                    <div class="content-page">
                        <div class="row margin-bottom-30">
                            <!-- BEGIN INFO BLOCK -->
                            <div class="col-md-7">
                                <p align="justify">El objetivo de esta plataforma es facilitar la elección de tesis de grado, de manera dinámica, a través de una interfaz amigable y basada en los intereses académicos del estudiante.</p>
                                <h2 class="no-top-space">Introducción</h2>
                                <p align="justify">Ante la dificultad de los estudiantes al elegir un tema de tesis de grado, se desarrolló una plataforma web para guiarlo en dicho propósito. De una manera organizada, sintetizada, sencilla y clara, al usuario (estudiante) se le presenta información relacionada con sus posibles intereses académicos (título de la tesis, tema central y línea de investigación asociados, datos del asesor, perfil del tesista, beneficios recibidos). A través de la selección de dichos intereses, se le mostrarán los temas de las tesis disponibles de realizar, acorde a las características de su elección, así como un resumen de las mismas, coadyuvando a la toma de decisión de su tema de tesis.</p>
                                <h2 class="no-top-space">Conclusiones</h2>
                                <p align="justify">Los estudiantes serán beneficiados al conocer lo básico y necesario acerca de un tema de tesis de grado,  pudiendo elegir su tema, de manera acertada, rápida y sencilla, acorde a sus intereses académicos. Adicionalmente, y dado que es una plataforma web, el estudiante podrá acceder a esta herramienta en cualquier momento y desde cualquier lugar. Todo ello permite que, al usar esta plataforma, el estudiante elija con facilidad y certeza, su tema de tesis.
                                </p>
                                <!-- BEGIN LISTS -->
                                <div class="row front-lists-v1">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled margin-bottom-20">
                                            <li><i class="fa fa-check"></i> Interfaz de usuario amigable</li>
                                            <li><i class="fa fa-check"></i> Dinámica y Rápida </li>
                                            <li><i class="fa fa-check"></i> Responsive</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check"></i> Selección de tesis</li>
                                            <li><i class="fa fa-check"></i> Proceso de aceptación </li>
                                            <li><i class="fa fa-check"></i> Generación de la carta de compromiso</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- END LISTS -->
                            </div>
                            <!-- END INFO BLOCK -->

                            <!-- BEGIN PROGRESS BAR -->
                            <div class="col-md-5 front-skills margin-top--20">
                                <h2 class="block">Nuestras Habilidades</h2>
                                <span>Eficacia y Eficiencia 100%</span>
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar" style="width: 100%;"></div>
                                </div>
                                <span>Disponibilidad 99%</span>
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar" style="width: 99%;"></div>
                                </div>
                                <span>Dinamismo 99%</span>
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar" style="width: 99%;"></div>
                                </div>
                                <span>Interfaz de usuario amigable 100%</span>
                                <div class="progress">
                                    <div role="progressbar" class="progress-bar" style="width: 100%;"></div>
                                </div>
                            </div>
                            <!-- END PROGRESS BAR -->
                        </div>

                        <!--<div class="row front-team">
                            <ul class="list-unstyled">
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <img alt="" src="assets/pages/img/people/avatar-large.png">
                                        <h3>
                                            <strong>Jorge Luis Aguirre</strong>
                                            <small>Desarrollador Web / FRONT & BACK-END</small>
                                        </h3>
                                        <p>Software Engineering at Emergys Mexico, IBM Integration Bus Internship ...</p>
                                        <ul class="social-icons social-icons-color">
                                            <li><a class="facebook" data-original-title="Facebook" href="javascript:;"></a></li>
                                            <li><a class="twitter" data-original-title="Twitter" href="javascript:;"></a></li>
                                            <li><a class="googleplus" data-original-title="Goole Plus" href="javascript:;"></a></li>
                                            <li><a class="linkedin" data-original-title="Linkedin" href="javascript:;"></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <img alt="" src="assets/pages/img/people/avatar-large.png">
                                        <h3>
                                            <strong>Alan Ulises Montes</strong>
                                            <small>Desarrollador Web / BACK-END</small>
                                        </h3>
                                        <p>Software Engineering at Emergys Mexico, Java Developer Internship...</p>
                                        <ul class="social-icons social-icons-color">
                                            <li><a class="facebook" data-original-title="Facebook" href="javascript:;"></a></li>
                                            <li><a class="twitter" data-original-title="Twitter" href="javascript:;"></a></li>
                                            <li><a class="googleplus" data-original-title="Goole Plus" href="javascript:;"></a></li>
                                            <li><a class="linkedin" data-original-title="Linkedin" href="javascript:;"></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <img alt="" src="assets/pages/img/people/avatar-large.png">
                                        <h3>
                                            <strong>María Eugenia Cabello</strong>
                                            <small>D. en C / ASESORA</small>
                                        </h3>
                                        <p>Profesora de tiempo completo en la Facultad de Telemática...</p>
                                        <ul class="social-icons social-icons-color">
                                            <li><a class="facebook" data-original-title="Facebook" href="javascript:;"></a></li>
                                            <li><a class="twitter" data-original-title="Twitter" href="javascript:;"></a></li>
                                            <li><a class="googleplus" data-original-title="Goole Plus" href="javascript:;"></a></li>
                                            <li><a class="linkedin" data-original-title="Linkedin" href="javascript:;"></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <img alt="" src="assets/pages/img/people/avatar-large.png">
                                        <h3>
                                            <strong>José Roman Herrera</strong>
                                            <small>D. en C / COASESOR</small>
                                        </h3>
                                        <p>Profesor de tiempo completo en la Facultad de Telemática...</p>
                                        <ul class="social-icons social-icons-color">
                                            <li><a class="facebook" data-original-title="Facebook" href="javascript:;"></a></li>
                                            <li><a class="twitter" data-original-title="Twitter" href="javascript:;"></a></li>
                                            <li><a class="googleplus" data-original-title="Goole Plus" href="javascript:;"></a></li>
                                            <li><a class="linkedin" data-original-title="Linkedin" href="javascript:;"></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
          <!-- END SIDEBAR & CONTENT -->
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
