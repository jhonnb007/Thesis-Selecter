<?php
    include_once 'assets/code/include/db_functions.php';
    include_once 'assets/code/researcher.php';
    include_once 'assets/code/thesis.php';
    include_once 'assets/code/student.php';

    session_start();

    if (!isset($_SESSION['researcher']))
    {
        header("Location: error-permission.php");
    }

    setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
    // echo "<script type='text/javascript'>alert('$thesis_id');</script>";

    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    if (isset($_POST['btnThesis']))
    {
        $thesis_id = $_POST['btnThesis'];
        $_SESSION['thesis_id'] = $thesis_id;
        $_SESSION['thesis'] = $_SESSION['theses'][$thesis_id - 1];
    }
    else if(isset($_GET['thesis_id']))
    {
        $thesis_id = $_GET['thesis_id'];
        $_SESSION['thesis_id'] = $_GET['thesis_id'];
        $_SESSION['thesis'] = $_SESSION['theses'][$thesis_id - 1];
    }
    else
    {
        $thesis_id = $_SESSION['thesis']->get_id();
    }

    $students = get_thesis_students($thesis_id);
    $rowcount = count($students);
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
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">
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

    <!-- Theme Microsoft START -->
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=ProgId content=Word.Document>
    <meta name=Generator content="Microsoft Word 15">
    <meta name=Originator content="Microsoft Word 15">
    <link rel=File-List href="assets/corporate/letter/filelist.xml">
    <link rel=Edit-Time-Data href="assets/corporate/letter/editdata.mso">

    <link href="assets/corporate/css/styleLetter.css" rel="stylesheet">
    <link rel=themeData href="assets/corporate/letter/themedata.thmx">
    <link rel=colorSchemeMapping href="assets/corporate/letter/colorschememapping.xml">
    <!-- Theme Microsoft END -->
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
                            <li><a href="assets/code/session?logout=true">Cerrar Sesión</a></li>
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
            <li><a href="my-theses.php">Mis Tesis</a></li>
            <li class="active">Detalle</li>
        </ul>

        <!-- BEGIN TABS AND TESTIMONIALS -->
        <div class="row mix-block margin-bottom-40">
            <!-- TABS -->
            <div class="col-md-12 tab-style-1">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-1" data-toggle="tab">Tesis</a></li>
                    <li><a href="#tab-2" data-toggle="tab">Tesistas</a></li>
                    <li><a href="#tab-3" data-toggle="tab">Carta de Compromiso</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane row fade in active" id="tab-1">
                        <div class="col-md-12 col-sm-12">
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
                                    <tr>
                                        <td width="34%"><h4><a href="javascript:;">Tema Central:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_topic();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Grupo de Investigación:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_research_group_key() . "-" . $_SESSION['thesis']->get_researcher()->get_research_group();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Linea de Investigación:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_research_line();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Perfil de Estudiante:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_educative_program();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Tecnologías:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_requirements();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Número de alumnos requeridos:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_plazas();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Número de alumnos aceptados:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_assigned();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Nombre del asesor:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_full_name();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">E-mail del asesor:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_email();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Universidad de adscripción del asesor:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_university();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Dependencia de adscripción del asesor:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_school();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Edificio donde labora el asesor:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_building();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Cubículo donde se encuentra el asesor:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_researcher()->get_room();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Tipo de apoyo al alumno:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->get_support();?></td>
                                    </tr>
                                    <tr>
                                        <td><h4><a href="javascript:;">Institución financiadora:</a></h4></td>
                                        <td><?php echo $_SESSION['thesis']->has_funding_agency();?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-4 text-center padding-top-10 margin-bottom-20">
                                    <button onclick="window.location.href='summary.php?thesis_tabs=true'" class="btn btn-primary">Ver resumen</button>
                                    <button type="button" onclick="window.location.href='my-theses.php'" class="btn btn-default">Regresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane row fade" id="tab-2">
                        <div class="col-md-12 col-sm-12">
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
                                </tbody>
                            </table>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="#accordion1_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                        Alumnos aceptados en la tesis
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse in" id="accordion1_1">
                                    <div class="panel-body">
                                        <table class="table table-hover" id="dev-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Alumno</th>
                                                    <th>Correo electrónico</th>
                                                    <th>Universidad</th>
                                                    <th>Facultad</th>
                                                    <th>Carrera</th>
                                                </tr>
                                            </thead>
                                            <!-- LISTING -->
                                            <?php if(isset($students) && count($students) && $rowcount > 0) : $i = 0; ?>
                                                <?php foreach ($students as $studentsall) : ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $studentsall->get_id(); ?></td>
                                                        <td><?php echo $studentsall->get_full_name(); ?></td>
                                                        <td><?php echo $studentsall->get_email(); ?></td>
                                                        <td><?php echo $studentsall->get_university(); ?></td>
                                                        <td><?php echo $studentsall->get_school(); ?></td>
                                                        <td><?php echo $studentsall->get_educative_program(); ?></td>
                                                    </tr>
                                                </tbody>
                                                <?php $i++; endforeach; ?>
                                            <?php endif; ?>
                                            <!-- /.LISTING -->
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-4 text-center padding-top-10 margin-bottom-20">
                                    <button type="button" onclick="window.location.href='my-theses.php'" class="btn btn-default">Regresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-3">


                        <!-- LETTER START-->
                        <div id="letter">
                            <div class=WordSection1>

                                <p class=MsoNormal>
                                    <span lang=ES style='mso-no-proof:yes'>
                                        <![if !vml]>
                                        <img width=727 height=80 accesskey="" src="assets/corporate/letter/image002.jpg" v:shapes="Picture_x0020_4">
                                        <![endif]>
                                    </span>
                                </p>

                                <p class=MsoNormal align=right style='text-align:right'>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <span lang=ES style='font-family:"Verdana",sans-serif;mso-fareast-font-family:Verdana;mso-bidi-font-family:Verdana'>
                                            <o:p>&nbsp;</o:p>
                                        </span>
                                    </b>
                                </p>

                                <p class=MsoNormal align=center style='margin-left:212.4pt;text-align:center;text-indent:35.4pt'>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                            Asunto:
                                        </span>
                                    </b>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-spacerun:yes'>  </span>
                                        <i style='mso-bidi-font-style:normal'>
                                            Carta de compromiso sobre asesoría de proyecto (Seminario de Investigación)<o:p></o:p>
                                        </i>
                                    </span>
                                </p>

                                <p class=MsoNormal align=right style='text-align:right'>
                                    <i style='mso-bidi-font-style:normal'>
                                        <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                            <o:p>&nbsp;</o:p>
                                        </span>
                                    </i>
                                </p>

                                <p class=MsoNormal align=right style='text-align:right'>
                                    <i style='mso-bidi-font-style:normal'>
                                        <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                            Colima, Col. a <?php echo date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; ?>
                                        </span>
                                    </i>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        Catedrático de la Unidad de Aprendizaje <o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                            Seminario de Investigación I y II<o:p></o:p>
                                        </span>
                                    </b>
                                </p>

                                <p class=MsoNormal>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                            P R E S E N T E<o:p></o:p>
                                        </span>
                                    </b>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                    <span lang=ES style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <o:p>&nbsp;</o:p>
                                    </span>
                                </p>

                                <?php
                                    if($rowcount <> 0){
                                        if($rowcount == 1){ ?>

                                            <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                                <span lang=ES style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                    Por medio de la presente, se hace de su conocimiento que asesoraré al alumno
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        <i style='mso-bidi-font-style:normal'>
                                                            <u>
                                                                <?php  echo $studentsall->get_full_name(); ?>
                                                            </u>
                                                        </i>
                                                    </b>
                                                        en su
                                                    <i style='mso-bidi-font-style:normal'>
                                                        proyecto de investigación
                                                    </i>
                                                        denominado
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        “<u>
                                                            <?php echo $_SESSION['thesis']->get_name();?>.
                                                        </u>”.<u><o:p></o:p></u>
                                                    </b>
                                                </span>
                                            </p>

                                            <?php
                                        } else if($rowcount == 2){ ?>

                                            <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                                <span lang=ES style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                    Por medio de la presente, se hace de su conocimiento que asesoraré a los alumnos
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        <i style='mso-bidi-font-style:normal'>
                                                            <u>
                                                                <?php  echo $students[0]->get_full_name(); ?> y
                                                                <?php  echo $students[1]->get_full_name(); ?>
                                                            </u>
                                                        </i>
                                                    </b>
                                                        en su
                                                    <i style='mso-bidi-font-style:normal'>
                                                        proyecto de investigación
                                                    </i>
                                                        denominado
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        “<u>
                                                            <?php echo $_SESSION['thesis']->get_name();?>.
                                                        </u>”.<u><o:p></o:p></u>
                                                    </b>
                                                </span>
                                            </p>

                                            <?php
                                        } else { ?>

                                            <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                                <span lang=ES style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                    Por medio de la presente, se hace de su conocimiento que asesoraré a los alumnos
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        <i style='mso-bidi-font-style:normal'>
                                                            <u>
                                                                <?php  echo $students[0]->get_full_name(); ?>,
                                                                <?php  echo $students[1]->get_full_name(); ?> y
                                                                <?php  echo $students[2]->get_full_name(); ?>
                                                            </u>
                                                        </i>
                                                    </b>
                                                        en su
                                                    <i style='mso-bidi-font-style:normal'>
                                                        proyecto de investigación
                                                    </i>
                                                        denominado
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        “<u>
                                                            <?php echo $_SESSION['thesis']->get_name();?>.
                                                        </u>”.<u><o:p></o:p></u>
                                                    </b>
                                                </span>
                                            </p>

                                            <?php
                                        }
                                    }
                                ?>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <span lang=ES style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                            <span style='mso-spacerun:yes'> </span>
                                        </span>
                                    </b>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <span lang=ES style='font-size:9.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p></o:p></span>
                                    </b>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <i style='mso-bidi-font-style:normal'>
                                            <span lang=ES style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                Por su parte el alumno se compromete a:<o:p></o:p>
                                            </span>
                                        </i>
                                    </b>
                                </p>

                                <p class=MsoNormal style='margin-left:53.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level1 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                                    </span><![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        Respetar las fechas para la entrega de avances que aparecen a continuación:
                                    </span>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal style='margin-left:89.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level2 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>o<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                                    </span><![endif]><span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        Seminario de investigación I (6to semestre)<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:125.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level3 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9642;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        1ra Parcial: Fuentes bibliográficas y áreas de oportunidad<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:125.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level3 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9642;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        2da Parcial: <span style='mso-spacerun:yes'> </span>Propuesta de solución al problema seleccionado<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:125.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level3 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9642;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        3ra Parcial: Estado del arte<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:89.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level2 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>o<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                                    </span><![endif]><span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        Seminario de Investigación II (7mo semestre)<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:125.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level3 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9642;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        1ra Parcial: Metodología<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:125.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level3 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9642;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        2da Parcial: Desarrollo (presentación de la solución tecnológica)<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:125.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level3 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9642;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]><span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'>
                                        3ra Parcial: Evaluación y resultados<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='margin-left:53.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level1 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        Respetar el cronograma de trabajo definido en la “propuesta de proyecto” aprobada por los asesores.
                                    </span>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal style='margin-left:53.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level1 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        Entregar los documentos o productos a los asesores para revisar al menos 5 días hábiles antes de entregarlos al profesor de seminario.
                                    </span>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal style='margin-left:53.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level1 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        No entregar documentos o productos a los profesores de seminario si no llevan el visto bueno o la firma de los asesores
                                    </span>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal style='margin-left:53.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level1 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span><![endif]><span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        No cambiar el tema del proyecto una vez iniciado, sin que antes sea aprobado por los asesores y el profesor de seminario.
                                    </span>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal style='margin-left:53.45pt;text-align:justify;text-justify:inter-ideograph;text-indent:-18.0pt;mso-list:l0 level1 lfo1'>
                                    <![if !supportLists]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <span style='mso-list:Ignore'>&#9679;<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span></span>
                                    </span>
                                    <![endif]>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        Presentar avances del proyecto en las reuniones que sea convocado por los asesores.
                                    </span>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p>&nbsp;</o:p></span>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'>
                                    <b style='mso-bidi-font-weight:normal'>
                                        <i style='mso-bidi-font-style:normal'>
                                            <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                Nota:
                                            </span>
                                        </i>
                                    </b>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        <i style='mso-bidi-font-style:normal'>
                                            Es del conocimiento de los interesados (profesor, alumnos y asesores)
                                            que si los alumnos no cumplen los compromisos anteriormente mencionados, esto
                                            exime al catedrático de la Unidad de Aprendizaje de dirigir el proyecto y
                                            avalar los avances correspondientes (mismo que se verá reflejado en una
                                            calificación reprobatoria).
                                        </i><o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p>&nbsp;</o:p></span>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                    <span lang=ES style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        Sin más por el momento reciba un cordial saludo.<o:p></o:p>
                                    </span>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph;text-indent:35.45pt;line-height:150%'>
                                    <span lang=ES style='font-size:5.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p>&nbsp;</o:p></span>
                                </p>

                                <p class=MsoNormal align=center style='text-align:center;text-indent:35.45pt;line-height:150%'>
                                    <span lang=ES style='font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                        ATENTAMENTE:
                                    </span>
                                    <span lang=ES style='font-size:10.0pt;mso-bidi-font-size:11.0pt;line-height:150%;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p></o:p></span>
                                </p>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'>
                                    <span lang=ES style='font-size:4.0pt;mso-bidi-font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p>&nbsp;</o:p></span>
                                </p>

                                <div align=center>
                                    <table class=a border=1 cellspacing=0 cellpadding=0 width=755 style='border-collapse:collapse;mso-table-layout-alt:fixed;border:none;mso-border-alt:solid black .5pt;mso-padding-alt:0cm 5.75pt 0cm 5.75pt;mso-border-insideh:.5pt solid black;mso-border-insidev:.5pt solid black'>
                                        <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
                                            <td width=252 style='width:188.75pt;border:solid black 1.0pt;mso-border-alt:solid black .5pt;padding:0cm 5.75pt 0cm 5.75pt'>
                                                <p class=MsoNormal align=center style='text-align:center'>
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        <i style='mso-bidi-font-style:normal'>
                                                            <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                                Asesor de Tesis<o:p></o:p>
                                                            </span>
                                                        </i>
                                                    </b>
                                                </p>
                                            </td>
                                            <td width=252 style='width:188.7pt;border:solid black 1.0pt;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;padding:0cm 5.75pt 0cm 5.75pt'>
                                                <p class=MsoNormal align=center style='text-align:center'><b style='mso-bidi-font-weight:normal'>
                                                        <i style='mso-bidi-font-style:normal'>
                                                            <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                                Co-Asesor de Tesis<o:p></o:p>
                                                            </span>
                                                        </i>
                                                    </b>
                                                </p>
                                            </td>
                                            <td width=252 style='width:188.75pt;border:solid black 1.0pt;border-left:none;mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;padding:0cm 5.75pt 0cm 5.75pt'>
                                                <p class=MsoNormal align=center style='text-align:center'>
                                                    <b style='mso-bidi-font-weight:normal'>
                                                        <i style='mso-bidi-font-style:normal'>
                                                            <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                                Alumnos<o:p></o:p>
                                                            </span>
                                                        </i>
                                                    </b>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>
                                            <td width=252 style='width:188.75pt;border:solid black 1.0pt;border-top:none;mso-border-top-alt:solid black .5pt;mso-border-alt:solid black .5pt;padding:0cm 5.75pt 0cm 5.75pt'>
                                                <p class=MsoNormal><b style='mso-bidi-font-weight:normal'>
                                                        <span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial;text-transform:uppercase;'>
                                                            <?php echo $_SESSION['researcher']->get_full_name(); ?><o:p></o:p>
                                                        </span>
                                                    </b>
                                                </p>
                                            </td>
                                            <td width=252 style='width:188.7pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;padding:0cm 5.75pt 0cm 5.75pt'>
                                                <p class=MsoNormal>
                                                    <b style='mso-bidi-font-weight:normal'><span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'>
                                                            <input type="text" name="nameCoasesor" id="nameCoasesor" class="col-2 element-white no-print-required" style="border-bottom: 1px solid #c3c3c3; background: #fafafa; text-transform:uppercase;" size="35" ><o:p></o:p>
                                                        </span>
                                                    </b>
                                                </p>
                                            </td>
                                            <td width=252 style='width:188.75pt;border-top:none;border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;mso-border-top-alt:solid black .5pt;mso-border-left-alt:solid black .5pt;mso-border-alt:solid black .5pt;padding:0cm 5.75pt 0cm 5.75pt'>

                                                <?php
                                                    if($rowcount <> 0){
                                                        if($rowcount == 1){ ?>

                                                            <p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:12.0pt;margin-left:0cm'><b style='mso-bidi-font-weight:normal'>
                                                                    <i style='mso-bidi-font-style:normal'>
                                                                        <u>
                                                                            <span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial;text-transform:uppercase;'>
                                                                                <?php  echo $studentsall->get_full_name(); ?><o:p></o:p>
                                                                            </span>
                                                                        </u>
                                                                    </i>
                                                                </b>
                                                            </p>

                                                            <?php
                                                        } else if($rowcount == 2){ ?>

                                                            <!-- LISTING -->
                                                            <?php if(isset($students) && count($students) && $rowcount > 0) : $i = 0; ?>
                                                                <?php foreach ($students as $studentstwo) : ?>

                                                                    <p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:12.0pt;margin-left:0cm'>
                                                                        <b style='mso-bidi-font-weight:normal'>
                                                                            <i style='mso-bidi-font-style:normal'>
                                                                                <u>
                                                                                    <span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial;text-transform:uppercase;'>
                                                                                        <?php  echo $studentstwo->get_full_name(); ?><o:p></o:p>
                                                                                    </span>
                                                                                </u>
                                                                            </i>
                                                                        </b>
                                                                    </p>

                                                                <?php $i++; endforeach; ?>
                                                            <?php endif; ?>
                                                            <!-- /.LISTING -->

                                                            <?php
                                                        } else { ?>

                                                            <!-- LISTING -->
                                                            <?php if(isset($students) && count($students) && $rowcount > 0) : $i = 0; ?>
                                                                <?php foreach ($students as $studentsthree) : ?>

                                                                    <p class=MsoNormal style='margin-top:12.0pt;margin-right:0cm;margin-bottom:12.0pt;margin-left:0cm'>
                                                                        <b style='mso-bidi-font-weight:normal'>
                                                                            <i style='mso-bidi-font-style:normal'>
                                                                                <u>
                                                                                    <span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial;text-transform:uppercase;'>
                                                                                        <?php  echo $studentsthree->get_full_name(); ?><o:p></o:p>
                                                                                    </span>
                                                                                </u>
                                                                            </i>
                                                                        </b>
                                                                    </p>

                                                                <?php $i++; endforeach; ?>
                                                            <?php endif; ?>
                                                            <!-- /.LISTING -->

                                                            <?php
                                                        }
                                                    }
                                                ?>

                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <p class=MsoNormal style='text-align:justify;text-justify:inter-ideograph'>
                                    <span lang=ES style='font-size:11.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial'><o:p>&nbsp;</o:p></span>
                                </p>

                            </div>
                        </div>
                        <!-- LETTER END -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Danger messages -->
                                <!--<div class="alert alert-danger alert-autocloseable-danger text-center">
                                        Favor de escribir el nombre del Catedrático de la Unidad de Aprendizaje de <strong>Seminario de Investigación I.</strong>
                                </div>-->

                                <!-- Danger buttons messages -->
                                <button id="btnPrint" class="btn btn-primary btn-block">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                    Imprimir Documento
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END TABS -->
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
    <script src="assets/corporate/scripts/print.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
