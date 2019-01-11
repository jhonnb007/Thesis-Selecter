<?php
    include_once 'assets/code/include/db_functions.php';
    include_once 'assets/code/researcher.php';
    include_once 'assets/code/thesis.php';

    session_start();

    if (!isset($_SESSION['researcher']))
    {
        header("Location: error-permission.php");
    }

    $researcher = $_SESSION['researcher']->get_id();

    $studentsInProcess = get_in_process_requests($researcher);
    $studentsAccepted = get_accepted_requests($researcher);
    $studentsRejected = get_rejected_requests($researcher);
    $rowcountInProcess = count($studentsInProcess);
    $rowcountAccepted = count($studentsAccepted);
    $rowcountRejected = count($studentsRejected);
?>
<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jorge Luis Aguirre Martínez, Ing. Alan Ulises Montes Rodríguez & Ing. José Angel Torres Martínez
-- © November 03, 2018 Derechos Reservados, Universidad de Colima.
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
                    <li><a href="my-theses.php">Mis Tesis</a></li>
                    <li class="active"><a href="requests.php">Solicitudes</a></li>
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
                <li><a href="/Thesis-Selecter">Inicio</a></li>
                <li class="active">Solicitudes</li>
            </ul>
            <div class="row margin-bottom-137">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Solicitudes</h1>
                    <div class="content-page">
                        <div class="row margin-bottom-60">
                            <div class="col-md-12 col-sm-12">
                                <div class="tab-content" style="padding:0; background: #fff;">
                                <!-- START REQUESTS -->
                                    <div class="panel-group" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#accordion1_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                                        1. En Proceso...
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse in" id="accordion1_1">
                                                <div class="panel-body">
                                                    <table class="table table-hover" id="dev-table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col" width="32%">Tesis</th>
                                                                <th scope="col">Alumno</th>
                                                                <th scope="col">Correo electrónico</th>
                                                                <th scope="col">Facultad</th>
                                                                <th scope="col">Carrera</th>
                                                                <th width="13%">Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- LISTING -->
                                                        <?php if(isset($studentsInProcess) && count($studentsInProcess) && $rowcountInProcess > 0) : $i = 0; ?>
                                                            <?php foreach ($studentsInProcess as $studentsIn) : ?>
                                                            <tbody>

                                                                <?php
                                                                    $status = get_thesis_status_std($studentsIn);

                                                                    if($status == 1)
                                                                    {?>
                                                                        <tr>
                                                                            <td><?php echo $studentsIn->get_id(); ?></td>
                                                                            <td><?php echo $studentsIn->get_thesis(); ?></td>
                                                                            <td><?php echo $studentsIn->get_full_name(); ?></td>
                                                                            <td><?php echo $studentsIn->get_email(); ?></td>
                                                                            <td><?php echo $studentsIn->get_school(); ?></td>
                                                                            <td><?php echo $studentsIn->get_educative_program(); ?></td>
                                                                            <td>
                                                                                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                                                                    <button type="button" data-toggle="modal" data-student-id="<?php echo $studentsIn->get_id(); ?>" data-thesis-id="<?php echo $studentsIn->get_thesis_id(); ?>" data-target="#prompt" href="" class="btn btn-default">Aceptar</button>
                                                                                    <button type="button" onclick="window.location.href='assets/code/requests.php?reject=<?php echo $studentsIn->get_id(); ?>'" class="btn btn-default">Rechazar</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    else
                                                                    {?>
                                                                        <tr>
                                                                            <td><?php echo $studentsIn->get_id(); ?></td>
                                                                            <td><?php echo $studentsIn->get_thesis(); ?></td>
                                                                            <td><?php echo $studentsIn->get_full_name(); ?></td>
                                                                            <td><?php echo $studentsIn->get_email(); ?></td>
                                                                            <td><?php echo $studentsIn->get_school(); ?></td>
                                                                            <td><?php echo $studentsIn->get_educative_program(); ?></td>
                                                                            <td>
                                                                                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                                                                                    <button type="button" class="btn btn-default" disabled="true">Aceptar</button>
                                                                                    <button type="button" title="Número de alumnos requeridos completado." onclick="window.location.href='assets/code/requests.php?reject=<?php echo $studentsIn->get_id(); ?>'" class="btn btn-default">Rechazar</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                ?>
                                                            </tbody>
                                                            <?php $i++; endforeach; ?>
                                                        <?php endif; ?>
                                                        <!-- /.LISTING -->
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal" id="prompt">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Verificación de la entrevista</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Ya se realizó la entrevista? Recuerde que la entrevista es requisito para aceptar al alumno como su tesista.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" id="btn-accept" onclick="" class="btn btn-primary">Aceptar</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-default">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#accordion1_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                        2. Aceptados...
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="accordion1_2">
                                                <div class="panel-body">
                                                    <table class="table table-hover" id="dev-table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th width="41%">Tesis</th>
                                                                <th>Alumno</th>
                                                                <th>Correo electrónico</th>
                                                                <th>Facultad</th>
                                                                <th>Carrera</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- LISTING -->
                                                        <?php if(isset($studentsAccepted) && count($studentsAccepted) && $rowcountAccepted > 0) : $i = 0; ?>
                                                            <?php foreach ($studentsAccepted as $studentsAc) : ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $studentsAc->get_id(); ?></td>
                                                                    <td><?php echo $studentsAc->get_thesis(); ?></td>
                                                                    <td><?php echo $studentsAc->get_full_name(); ?></td>
                                                                    <td><?php echo $studentsAc->get_email(); ?></td>
                                                                    <td><?php echo $studentsAc->get_school(); ?></td>
                                                                    <td><?php echo $studentsAc->get_educative_program(); ?></td>
                                                                    <td><div class="btn-group btn-group-xs" role="group" aria-label="...">
                                                                        <button type="button" class="btn btn-default">Revertir</button>
                                                                    </div> </td>
                                                                </tr>
                                                            </tbody>
                                                            <?php $i++; endforeach; ?>
                                                        <?php endif; ?>
                                                        <!-- /.LISTING -->
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#accordion1_3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle collapsed">
                                                        3. Rechazados...
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="accordion1_3">
                                                <div class="panel-body">
                                                    <table class="table table-hover" id="dev-table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th width="41%">Tesis</th>
                                                                <th>Alumno</th>
                                                                <th>Correo electrónico</th>
                                                                <th>Facultad</th>
                                                                <th>Carrera</th>
                                                            </tr>
                                                        </thead>
                                                        <!-- LISTING -->
                                                        <?php if(isset($studentsRejected) && count($studentsRejected) && $rowcountRejected > 0) : $i = 0; ?>
                                                            <?php foreach ($studentsRejected as $studentsR) : ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $studentsR->get_id(); ?></td>
                                                                    <td><?php echo $studentsR->get_thesis(); ?></td>
                                                                    <td><?php echo $studentsR->get_full_name(); ?></td>
                                                                    <td><?php echo $studentsR->get_email(); ?></td>
                                                                    <td><?php echo $studentsR->get_school(); ?></td>
                                                                    <td><?php echo $studentsR->get_educative_program(); ?></td>
                                                                </tr>
                                                            </tbody>
                                                            <?php $i++; endforeach; ?>
                                                        <?php endif; ?>
                                                        <!-- /.LISTING -->
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- END REQUESTS -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
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

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();

            $("#prompt").on("show.bs.modal", function (event) {
                var student_id = $(event.relatedTarget).data('student-id');
                var thesis_id = $(event.relatedTarget).data('thesis-id');
                var modal = $(this);
                //console.log(idStudent);
                //console.log(thesisId);
                $("#btn-accept").attr("onclick", "window.location.href='assets/code/requests.php?accept=" + student_id + "&thesis_id=" + thesis_id + "'");
            });
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
