<!DOCTYPE html>
<?php
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


    $category =1;
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
    <link rel="stylesheet" href="assets\plugins\DataTables\DataTables-1.10.18\css\dataTables.bootstrap4.min.css">
    <link href="assets\plugins\DataTables\DataTables-1.10.18\css\jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css  " rel="stylesheet" type="text/css"> -->

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
            <a href="" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation pull-right font-transform-inherit">
                <ul>
                    <li class="active"><a href="administrador.php">Tesis</a></li>
                    <li><a href="thesis-requests.php">Solicitudes de Tesis</a></li>

                    <li class="dropdown">
                        <profile>
                            <div class="testimonials-v1 dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                                <div class="carousel-info">
                                    <img class="pull-left" src="<?php echo $_SESSION['researcher']->get_image_profile_administrador();?>" alt="avatar-small">
                                </div>
                            </div>
                        </profile>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#profile"><?php echo $_SESSION['researcher']->get_full_name_admnistrador(); ?></a></li>
                            <li><a href="assets/code/session.php?logout=true">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                    <!-- BEGIN TOP SEARCH -->
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="">
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
                <li class="active">Tesis</li>
            </ul>
            <div class="row margin-bottom-124">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12 col-sm-12">
                    <h1>Tesis</h1>
                    <div class="content-page">
                        <div class="row">
                        </div>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>
              <table id="tesis" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Asesor</th>
                        <th>Nombre</th>
                        <th>Tema</th>
                        <th>Ver</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Asesor</th>
                      <th>Nombre</th>
                      <th>Tema</th>
                      <th >Ver</th>
                      <th >Eliminar</th>
                    </tr>
                </tfoot>

                <?php
                get_administrator_thesis($category);
                while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                      <td><?php echo $row["ThesisID"]?></td>
                      <td><?php echo $row["ResearcherName"]?></td>
                      <td><?php echo $row["ThesisName"]?></td>
                      <td><?php echo $row["TopicName"]?></td>
                      <td class="text-center">
                        <button type="button" id="view" class="btn btn-primary"  data-toggle="modal" data-target="#thesisAdministrador" onclick="getThesisDetails(<?php echo $row["ThesisID"]?>)">
                          <span class="glyphicon glyphicon-eye-open"></span>
                        </button>
                      </td>

                      <td class="text-center">
                        <button type="button" data-toggle="modal" data-target="#thesisDelete" onclick="headerDeleteID(<?php echo $row["ThesisID"]?>)" class="btn btn-danger">
                          <span class="glyphicon glyphicon-remove"> </span>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
            </table>
            <br><br><br>

</div>
</div>

  </body>
  <?php include('assets/pages/modals/Administrator/view-thesis.php'); ?>
  <?php include('assets/pages/modals/Administrator/eliminar.php'); ?>
  <?php include('footer-fixed.php'); ?>
  <?php include('assets/pages/modals/Administrator/profile.php'); ?>
  <!-- Load javascripts at bottom, this will reduce page load time -->
  <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
  <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
  <script type="text/javascript" src="assets/pages/scripts/Administrator/Thesis.js"></script>
  <!-- END CORE PLUGINS -->
  <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
  <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
  <script src="assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" type="text/javascript"></script>
  <script type="text/javascript">
      jQuery(document).ready(function() {
          Layout.init();
          Layout.initUniform();
      });
  </script>
</html>
