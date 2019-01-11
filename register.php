<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jose Angel Torres Martinez
-- © December 20, 2018 Derechos Reservados, Universidad de Colima.
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
    <link rel="stylesheet" href="assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css">
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
                      <h2>Registrar</h2>
                  </div>
                  <div class="form-group col-sm-12">
                      <label for="RegisterName" class="col-lg-4 control-label">Nombre: <span class="require">*</span></label>
                      <div class="col-lg-8">
                          <input type="text" class="form-control" id="RegisterName" name="RegisterName" required="required">
                      </div>
                    </div>
                      <div class="form-group col-sm-12">
                        <label for="Registeremail" class="col-lg-4 control-label">Correo: <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="email" class="form-control" id="Registeremail" required="required">
                        </div>
                      </div>
                        <div class="form group col-sm-12">
                              <label for="RegisterDep" class="col-lg-4 control-label">Dependencia: <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <select  class="form-control" id="RegisterDep" name="RegisterDep" required="required"></select>
                            </div>
                          </div>
                          <div class="form-group col-sm-12">
                              <label for="RegisterEd" class="col-lg-4 control-label">Edificio: <span class="require">*</span></label>
                              <div class="col-lg-8">
                                  <select class="form-control" id="RegisterEd" name="RegisterEd" required="required"></select>
                              </div>
                            </div>
                            <div class="form group col-sm-12">
                                  <label for="RegisterCu" class="col-lg-4 control-label">Cubiculo: <span class="require">*</span></label>
                                <div class="col-lg-8">
                                    <select  class="form-control" id="RegisterCu" name="RegisterCu" required="required"></select>
                                </div>
                              </div>
                              <div class="form group col-sm-12">
                                    <label for="RegisterLi" class="col-lg-4 control-label">Linea de Investigación: <span class="require">*</span></label>
                                  <div class="col-lg-8">
                                      <select  class="form-control" id="RegisterLi" name="RegisterLi" required="required"></select>
                                  </div>
                                </div>
                                <div class="form group col-sm-12">
                                      <label for="RegisterG" class="col-lg-4 control-label">Grupo de Investigación: <span class="require">*</span></label>
                                    <div class="col-lg-8">
                                        <select  class="form-control" id="RegisterG" name="RegisterG" required="required"></select>
                                    </div>
                                  </div>


                         </form>

                      </div>



              </div>

            </div>
          </div>

                <!-- END CONTENT -->
            <!-- END SIDEBAR & CONTENT -->



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
    <script src="assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript"></script>
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
