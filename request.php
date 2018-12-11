<?php
    include_once 'assets/code/include/db_functions.php';
    include_once 'assets/code/student.php';
    include_once 'assets/code/university.php';
    include_once 'assets/code/educative_program.php';
    include_once 'assets/code/school.php';

    session_start();

    if (isset($_SESSION['researcher']))
    {
        header("Location: error-permission.php");
    }

    $status = get_thesis_status($_SESSION['thesis']);

    if (isset($_POST['btnRequest']))
    {
        $mystring = $_POST['email'];
        $findme   = '@ucol.mx';
        $pos = strpos($mystring, $findme);

        if (empty($_POST['firstname'])) {
		$_SESSION['empty_names_msg'] = "Ingrese su nombre(s)";
		header("Location: request.php");
	} else if (empty($_POST['lastname'])) {
		$_SESSION['empty_lastname_msg'] = "Ingrese su apellido paterno";
		header("Location: request.php");
        } else if (empty($_POST['lastname2'])) {
                $_SESSION['empty_lastname2_msg'] = "Ingrese su apellido materno";
                header("Location: request.php");
        } else if (empty($_POST['email']) || $pos === false) {
                $_SESSION['empty_email_msg'] = "Ingrese su email";
                header("Location: request.php");
        } else if (empty($_POST['educative'])) {
                $_SESSION['empty_educative_msg'] = "Favor de seleccionar su carrera";
                header("Location: request.php");
	} else {
                $student = new Student;
                //$university = new University;
                //$faculty = new School;
                $educative = new EducativeProgram;

                //$university2 = $_POST['university'];
                //$faculty2 = $_POST['faculty'];
                $educative2 = $_POST['educative'];

                //Hard-coded values
                //$exists_university = exists_university($university2);
                //$exists_faculty = exists_faculty($faculty2);
                $exists_educative = exists_educative($educative2);

                if ($exists_educative == FALSE){
                        header("Location: request.php");
                } else {
                        //$university->set_id($university2);
                        //$faculty->set_id($faculty2);
                        $educative->set_id($educative2);

                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $lastname2 = $_POST['lastname2'];
                        $email = $_POST['email'];

                        $student->set_full_name($firstname . ' ' . $lastname . ' ' . $lastname2);
                        $student->set_email($email);
                        //$student->set_university($university);
                        //$student->set_school($faculty);
                        $student->set_educative_program($educative);

                        if(send_request($_SESSION['thesis'], $student)){
                            header("Location: success.php");
                        }
                        else {
                            header("Location: error.php");
                        }
            }
	}
    }
?>
<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jorge Luis Aguirre Martínez & Ing. Alan Ulises Montes Rodríguez
-- © November 2, 2017 Derechos Reservados, TSFColima.
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
                    <li class="active"><a href="/thesis-selecter">Tesis</a></li>
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

        <ul class="breadcrumb">
            <li><a href="/thesis-selecter">Inicio</a></li>
            <li><a href="/thesis-selecter">Tesis</a></li>
            <li><a href="inside.php?thesis_id=<?php echo $_SESSION['thesis']->get_id();?>">Detalle</a></li>
            <li class="active">Solicitud</li>
        </ul>

        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <h2><?php echo $_SESSION['thesis']->get_name();?></h2>
                    </td>
                </tr>
                <tr>
            </tbody>
        </table>

        <div class="row margin-bottom-40 margin-top-10">
            <div class="col-lg-4 col-lg-offset-4 gallery-item">
                <a data-rel="fancybox-button" title="<?php echo $_SESSION['thesis']->get_name();?>" href="<?php echo $_SESSION['thesis']->get_image_in();?>" class="fancybox-button">
                    <img alt="<?php echo $_SESSION['thesis']->get_name();?>" src="<?php echo $_SESSION['thesis']->get_image_in();?>" class="img-responsive">
                    <div class="zoomix"><i class="fa fa-search"></i></div>
                </a>
            </div>
        </div>

        <h1 class="text-center">Favor de ingresar los siguientes datos</h1>

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu"></ul>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-9">
                <div class="content-form-page">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <form class="form-horizontal" role="form" method="post">
                                <fieldset>
                                    <legend>Datos personales</legend>
                                    <div class="form-group">
                                        <label for="firstname" class="col-lg-4 control-label">Nombre(s) <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="firstname" name="firstname" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-lg-4 control-label">Apellido Paterno <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="lastname" name="lastname" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname2" class="col-lg-4 control-label">Apellido Materno <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="lastname2" name="lastname2" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-lg-4 control-label">Correo electrónico <span class="require">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="email" name="email" pattern=".+@ucol.mx" required="required">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Datos Académicos </legend>
                                    <div class="form-group">
                                        <label for="university" class="col-lg-4 control-label">Universidad <span class="require">*</span></label>
                                        <div class="col-lg-8">

                                            <select class="form-control" id="university" name="university" disabled="true" required="required">
                                                <option value="1">Universidad de Colima</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="faculty" class="col-lg-4 control-label">Facultad <span class="require">*</span></label>
                                        <div class="col-lg-8">

                                            <select class="form-control" id="faculty" name="faculty" disabled="true" required="required">
                                                <option value="1">Facultad de Telemática</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="educative" class="col-lg-4 control-label">Perfil de Estudiante <span class="require">*</span></label>
                                        <div class="col-lg-8">

                                            <select class="form-control" id="educative" name="educative" required="required">
                                                <option value="2">Ingeniería de Software</option>
                                                <option value="1">Ingeniería de Telemática</option>
                                            </select>

                                        </div>
                                    </div>
                                </fieldset>
                                <?php
                                    if($status == 1)
                                    {?>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                            <button type="submit" name="btnRequest" class="btn btn-primary">Enviar Solicitud</button>
                                            <button type="button" onclick="window.location.href='/thesis-selecter'" class="btn btn-default">Cancelar</button>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    else
                                    {?>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                            <button title="Número de alumnos requeridos completado." class="btn btn-danger" disabled="true">Tesis no disponible</button>
                                            <button type="button" onclick="window.location.href='/thesis-selecter'" class="btn btn-default">Cancelar</button>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                ?>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-4 pull-right">
                            <div class="form-info">
                                <h2><em>Información</em> Importante</h2>

                                <p> Una vez que tu solicitud sea enviada con éxito,
                                    favor de dirigirte con el asesor de la tesis en cuestión
                                    para realizar o agendar una entrevista. Esa entrevista será
                                    requisito para poder asignarle el tema de tesis.
                                </p>

                                <p>Solamente los alumnos que se encuentren cursando el 6to semestre podrán enviar solicitudes.</p>

                                <p>Solo se aceptan correos de la Universidad de Colima (@ucol.mx).</p>

                                <button type="button" class="btn btn-default">Más detalles</button>
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
        <?php include('profile-teacher.php') ?>
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
