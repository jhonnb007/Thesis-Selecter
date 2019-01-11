<!DOCTYPE html>
<?php
$version = apache_get_version();
echo "$version\n";
include_once 'assets/code/include/db_functions.php';
include_once 'assets/code/researcher.php';
include_once 'assets/code/administrador.php';
include_once 'assets/code/thesis.php';
include_once 'assets/code/include/db_connection.php';

session_start();

if (!isset($_SESSION['researcher']))
{
    header("Location: error-permission.php");
}

if (isset($_POST['btnReject']))
    {
      $reject= $_POST['reject'];
      $sql = "UPDATE thesis SET Category='3' WHERE ThesisID=$reject";
      if ($connection->query($sql) === TRUE) {
       header("Location: thesis-requests.php");
         } else {
       header("Location: thesis-requests.php");
        }
       $connection->close();
    }

    if (isset($_POST['btnRevert']))
        {
          $revert= $_POST['revert'];
          $revert = "UPDATE thesis SET Category='2' WHERE ThesisID=$revert";
          if ($connection->query($revert) === TRUE) {
           header("Location: thesis-requests.php");
             } else {
           header("Location: thesis-requests.php");
            }
           $connection->close();
        }
    if (isset($_POST['btnAceptar']))
        {
          $accept= $_POST['accept'];
          $accept = "UPDATE thesis SET Category='1' WHERE ThesisID=$accept";
          if ($connection->query($accept) === TRUE) {
           header("Location: thesis-requests.php");
             } else {
           header("Location: thesis-requests.php");
             }
               $connection->close();
        }

// $processThesis = "SELECT ThesisID, R.ResearcherName, T.ThesisName, TP.TopicName, E.EducativeProgramName FROM thesis as T INNER JOIN level as L ON T.LevelID = L.LevelID INNER JOIN researcher as R ON T.ResearcherID = R.ResearcherID INNER JOIN status as S ON S.StatusID = T.StatusID INNER JOIN topic as TP ON TP.TopicID = T.TopicID INNER JOIN educative_program as E ON E.EducativeProgramID = T.EducativeProgramID INNER JOIN funding_agency_all as F ON F.FundingAgencyAllID = T.FundingAgencyAllID INNER JOIN research_group as RG ON RG.ResearchGroupID = T.ResearchGroupID INNER JOIN research_line as RL ON RL.ResearchLineID = T.ResearchLineID INNER JOIN support as SP ON SP.SupportID = T.SupportID WHERE Category = 2";
// $processResult = mysqli_query($connection, $processThesis);

// $rejectedThesis = "SELECT ThesisID, R.ResearcherName, T.ThesisName, TP.TopicName, E.EducativeProgramName FROM thesis as T INNER JOIN level as L ON T.LevelID = L.LevelID INNER JOIN researcher as R ON T.ResearcherID = R.ResearcherID INNER JOIN status as S ON S.StatusID = T.StatusID INNER JOIN topic as TP ON TP.TopicID = T.TopicID INNER JOIN educative_program as E ON E.EducativeProgramID = T.EducativeProgramID INNER JOIN funding_agency_all as F ON F.FundingAgencyAllID = T.FundingAgencyAllID INNER JOIN research_group as RG ON RG.ResearchGroupID = T.ResearchGroupID INNER JOIN research_line as RL ON RL.ResearchLineID = T.ResearchLineID INNER JOIN support as SP ON SP.SupportID = T.SupportID WHERE Category = 3";
// $rejectedResult = mysqli_query($connection, $rejectedThesis);
?>
<html lang="en" dir="ltr">
  <head>
    <?php include('metadata.php'); ?>
    <link href='assets/corporate/img/logos/logo-favicon.png' rel='shortcut icon' type='image/png'>
    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->
    <!-- Global styles START -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="assets\plugins\DataTables\DataTables-1.10.18\css\dataTables.bootstrap4.min.css">
    <link href="assets\plugins\DataTables\DataTables-1.10.18\css\jquery.dataTables.min.css" rel="stylesheet" type="text/css">
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
  </head>
  <body class="corporate">
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
    <div class="header">
        <div class="container">
            <a class="site-logo" href="administrador.php"><img src="assets/corporate/img/logos/logo-theses-turquoise.png" alt="Thesis Selecter"></a>
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation pull-right font-transform-inherit">
                <ul>
                    <li><a href="administrador.php">Tesis</a></li>
                    <li class="active"><a href="thesis-requests.php">Solicitudes de Tesis</a></li>
                    <li class="dropdown">
                        <profile>
                            <div class="testimonials-v1 dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                                <div class="carousel-info">
                                    <img class="pull-left" src="<?php echo $_SESSION['researcher']->get_image_profile_administrador();?>" alt="avatar-small">
                                </div>
                            </div>
                        </profile>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#profile"><?php echo $_SESSION['researcher']->get_full_name_admnistrador();?></a></li>
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
    <div class="main">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="administrador.php">Inicio</a></li>
                <li class="active">Solicitudes</li>
            </ul>
            <div class="row margin-bottom-124">
                <div class="col-md-12 col-sm-12">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tesisOnProcess">En proceso</a></li>
                    <li><a data-toggle="tab" href="#tesisDecline">Rechazadas</a></li>
                  </ul>
                    <div class="content-page">
                        <div class="row">
                          <?php include('thesis-table-content.php') ?>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
             </div>
             <br><br>
        </div>
    </div>
    <?php include('assets/pages/modals/Administrator/reject.php'); ?>
    <?php include('assets/pages/modals/Administrator/view-thesis.php'); ?>
    <?php include('assets/pages/modals/Administrator/accept.php'); ?>
    <?php include('assets/pages/modals/Administrator/revertir.php'); ?>
    <?php include('footer-fixed.php'); ?>
    <?php include('assets/pages/modals/Administrator/profile.php'); ?>
  </body>

    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/Administrator/Requests.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <script src="assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/plugins/DataTables/dataTables.responsive.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initUniform();
        });
    </script>
</html>
