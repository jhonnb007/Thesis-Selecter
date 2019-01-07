<?php
    include_once 'assets/code/include/db_connection.php';
    include_once 'assets/code/include/db_functions.php';
    session_start();
    if (!isset($_SESSION['researcher']))
    {
        header("Location: error-permission.php");
    }
    if (isset($_FILES['addThesisPicture']))
    {
      global $connection;
      $action = $_SESSION['researcher']->get_email();
      echo $action;
      $sql = "SELECT ResearcherID, ResearchLineID, ResearchGroupID FROM researcher where EmailAddress = '$action'";
      $result = $connection->query($sql);
      if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
             $researcher = $row['ResearcherID'];
             $group = $row['ResearchGroupID'];
             $line = $row['ResearchLineID'];
        }
      }
      $name = $_POST['addThesisName'];
      $topic = $_POST['addThesisTopic'];
      $plazas = $_POST['addThesisPlaza'];
      $profile = $_POST['addThesisProfile'];
      $agency = $_POST['addThesisAgency'];
      $tecnology = $_POST['addThesisTecnology'];
      $support = $_POST['addThesisSupport'];
      $summary = $_POST['addThesisSummary'];
      $foto=$_FILES["addThesisPicture"]["name"];
      $ruta=$_FILES["addThesisPicture"]["tmp_name"];
      $picture="assets/pages/img/thesis/".$foto;
      move_uploaded_file($ruta,$picture);
      $sql = "INSERT INTO `thesis` (`ThesisID`, `ThesisName`, `LevelID`, `PlazasID`, `ResearcherID`, `StatusID`, `TopicID`, `EducativeProgramID`, `FundingAgencyID`, `FundingAgencyAllID`, `ResearchGroupID`, `ResearchLineID`, `SupportID`, `ProjectID`, `RequirementsID`, `SscID`, `Assigned`, `Summary`, `Category`, `Image`, `ImageIn`) VALUES (NULL, '$name', '2', '$plazas', '$researcher', '1', '$topic', '$profile', '2', '$agency', '$group', '$line', '$support', NULL, '$tecnology', NULL, '0', '$summary', '2', '$picture', '$picture')";
      if ($connection->query($sql) === TRUE) {
        echo "<SCRIPT>
               alert('Aviso!, Solicitud enviada para aprobación');
             </SCRIPT>";
        header("location: my-theses.php");
         } else {
           echo "<SCRIPT>
                  alert('Aviso!, error al ingresar datos');
                </SCRIPT>";
           header("location: my-theses.php");
        }
       $connection->close();
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
                <li><a href="my-theses.php">Mis Tesis</a></li>
                <li class="active">Agregar Tesis</li>
            </ul>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-60 ">
                <!-- BEGIN CONTENT -->
                <form action="add-thesis.php"enctype="multipart/form-data" class="form-horizontal form-without-legend"  method="post">
                  <div class="col-md-12">
                      <h2>Agregar Tesis</h2>
                  </div>
                    <div class="form-group col-sm-12">
                        <label for="addThesisName" class="col-lg-4 control-label">Nombre de tesis: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" id="addThesisName" name="addThesisName" required="required">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="addThesisTopic" class="col-lg-4 control-label">Tema Central: <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <select class="form-control" id="addThesisTopic" name="addThesisTopic" required="required"></select>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="addThesisPlaza" class="col-lg-4 control-label">Alumnos requeridos: <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <select class="form-control" id="addThesisPlaza" name="addThesisPlaza" required="required">
                              <option></option>
                              <option value="1">Uno</option>
                              <option value="2">Dos</option>
                              <option value="3">Tres</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="addThesisProfile" class="col-lg-4 control-label">Perfil de Estudiante: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="addThesisProfile" name="addThesisProfile" required="required"></select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="addThesisProfile" class="col-lg-4 control-label">Tecnologías: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="addThesisTecnology" name="addThesisTecnology" required="required"></select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="addThesisSupport" class="col-lg-4 control-label">Tipo de apoyo: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="addThesisSupport" name="addThesisSupport" required="required"></select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="addThesisAgency" class="col-lg-4 control-label">Institución financiadora: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <select class="form-control" id="addThesisAgency" name="addThesisAgency" required="required"></select>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="addPicture" class="col-lg-4 control-label">Imagen: <span class="require">*</span></label>
                      <div class="col-lg-8 div-input">
                         <input id="addThesisPicture" name="addThesisPicture" required="required" type="file" class="filestyle" data-text="Explorar">                      </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="addThesisSummary" class="col-lg-4 control-label">Resumen: <span class="require">*</span></label>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="addThesisSummary" name="addThesisSummary" required="required" rows="8" cols="80"></textarea>
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
    <script src="assets/pages/scripts/Researcher/addThesis.js" type="text/javascript"></script>
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
