<?php
    include_once 'assets/code/include/db_connection.php';
    include_once 'assets/code/include/db_functions.php';
    include_once 'assets/code/researcher.php';
    require_once("config.php");

    session_start();
    $_SESSION['theses'] = get_theses();
    //$all_topic = $conn->query("SELECT distinct TopicID FROM `thesis` WHERE Category = '1' GROUP BY TopicID");
    $all_topic = $connection->query("SELECT distinct TC.TopicID, TC.TopicName FROM `thesis` AS T INNER JOIN `topic` AS TC ON T.TopicID = TC.TopicID WHERE Category = '1' GROUP BY TC.TopicName");
    $all_group = $connection->query("SELECT distinct R.ResearchGroupID, CONCAT_WS('-', R.ResearchGroupKey, R.ResearchGroupName) AS ResearchGroupName FROM `thesis` AS T INNER JOIN `research_group` AS R ON T.ResearchGroupID = R.ResearchGroupID WHERE Category = '1' GROUP BY R.ResearchGroupKey");
    $all_line = $connection->query("SELECT distinct RL.ResearchLineID, RL.ResearchLineName FROM `thesis` AS T INNER JOIN `research_line` AS RL ON T.ResearchLineID = RL.ResearchLineID WHERE Category = '1' GROUP BY RL.ResearchLineName");
    $all_program = $connection->query("SELECT distinct E.EducativeProgramID, E.EducativeProgramName FROM `thesis` AS T INNER JOIN `educative_program` AS E ON T.EducativeProgramID = E.EducativeProgramID WHERE Category = '1' GROUP BY E.EducativeProgramID");
    $all_researcher = $connection->query("SELECT distinct R.ResearcherID, R.ResearcherName FROM `thesis` AS T INNER JOIN `researcher` AS R ON T.ResearcherID = R.ResearcherID WHERE Category = '1' GROUP BY R.ResearcherName");

    // Filter Query
    $sql= "SELECT distinct ThesisID FROM `thesis` WHERE Category = '1'";
    if(isset($_GET['TopicID']) && $_GET['TopicID']!="") :
        $topic = $_GET['TopicID'];
        $sql.=" AND TopicID IN ('".implode("','",$topic)."')";
    endif;

    if(isset($_GET['ResearchGroupID']) && $_GET['ResearchGroupID']!="") :
        $group = $_GET['ResearchGroupID'];
        $sql.=" AND ResearchGroupID IN ('".implode("','",$group)."')";
    endif;

    if(isset($_GET['ResearchLineID']) && $_GET['ResearchLineID']!="") :
        $line = $_GET['ResearchLineID'];
        $sql.=" AND ResearchLineID IN (".implode(',',$line).")";
    endif;

    if(isset($_GET['EducativeProgramID']) && $_GET['EducativeProgramID']!="") :
        $program = $_GET['EducativeProgramID'];
        $sql.=" AND EducativeProgramID IN (".implode(',',$program).")";
    endif;

    if(isset($_GET['ResearcherID']) && $_GET['ResearcherID']!="") :
        $researcher = $_GET['ResearcherID'];
        $sql.=" AND ResearcherID IN (".implode(',',$researcher).")";
    endif;

    $all_thesis = $connection->query($sql);
    $content_per_page = 3;
    $rowcount = mysqli_num_rows($all_thesis);
    $total_data = ceil($rowcount / $content_per_page);

    function data_clean($str)
    {
        return str_replace(' ','_',$str);
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
    <meta http-equiv="expires" content="0" >
    <?php include('metadata.php');    ?>
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
    <!-- <link href="assets/corporate/css/themes/turquoise.css" rel="stylesheet" id="style-color">-->
    <link href="assets/corporate/css/custom.css" rel="stylesheet">
    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="corporate" ons>

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
              if ($saml->isAuthenticated())
              {
                ?>
                <ul>
                    <li class="active"><a href="/Thesis-Selecter">Tesis</a></li>
                    <li><a href="about.php">Sobre Nosotros</a></li>
                    <li class="dropdown">
                        <profile>
                            <div class="testimonials-v1 dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                                <div class="carousel-info">
                                    <img class="pull-left" src="assets/pages/img/people/avatar-small.png" alt="avatar-small">
                                </div>
                            </div>
                        </profile>
                        <ul class="dropdown-menu">
                            <li><a href="logout_federated.php">Cerrar Sesión</a></li>
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
                      <span class="sep"></span>
                    </li>
                    <!-- END TOP SEARCH -->
                </ul>
              <?php
              }
              else if (isset($_SESSION['researcher']))
                {
                  ?>
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
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#profileTeacher" ><?php echo $_SESSION['researcher']->get_full_name(); ?></a></li>
                                <li><a href="assets/code/session.php?logout=true">Cerrar Sesión</a></li>
                            </ul>
                        </li>


                        <!--<li><a href="assets/code/session.php?logout=true">Cerrar Sesión (<?php echo $_SESSION['researcher']->get_full_name(); ?>)</a></li>-->
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
            <ul class="breadcrumb">
                <li><a href="/Thesis-Selecter">Inicio</a></li>
                <li class="active">Tesis</li>
            </ul>

        <!-- BEGIN BLOCKQUOTE BLOCK -->
        <!--<div class="row quote-v1 margin-bottom-30">
          <div class="col-md-12">
            <span>Descubre tu tesis ideal a través de esta página web, la cual te permite seleccionar dinámicamente el tema de tesis de grado de acuerdo a tus intereses académicos (tema central, grupo de investigación asociado, línea de investigación asociado, asesor, etc).</span>
          </div>
        </div>
        -->
        <!-- END BLOCKQUOTE BLOCK -->

            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40">
                <!-- BEGIN CONTENT -->
                <div class="col-md-12">
                  <h1>Selección de tema de tesis</h1>
                    <div class="search-result-item">
                        <p>Descubre tu tesis ideal a través de esta página web, la cual te permite seleccionar dinámicamente el tema de tesis de grado de acuerdo a tus intereses académicos (tema central, grupo de investigación, línea de investigación, programa educativo, asesor, etc).</p>
                    </div>
                </div>
                <!-- END CONTENT -->
            </div>

            <!-- CONTENT -->
            <div class="content">
                <div class="container-fluid">
                    <form method="get" id="search_form">
                        <div class="row">
                            <!-- SIDEBAR -->
                            <aside class="col-lg-3 col-md-4">
                            <div class="pricing hover-effect">

                                <div class="pricing-head margin-bottom-20">
                                    <h3>Filtros
                                    <span>
                                        Filtro de búsqueda de tesis
                                    </span>
                                    </h3>
                                </div>

                                <div class="panel list">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Tema Central
                                            <a data-toggle="collapse" href="#panelOne">
                                                <i class="pull-right indicator fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                            <!--<a class="pull-right collapsed-icon-toggle" href="#panelOne" data-toggle="collapse">
                                                <span class="glyphicon glyphicon-minus on-opened"></span>
                                                <span class="glyphicon glyphicon-plus on-closed"></span>
                                            </a>-->
                                        </h3>
                                    </div>
                                    <?php
                                        if(!empty($_REQUEST['TopicID']))
                                        {?>
                                            <div class="panel-body collapse in" id="panelOne">
                                                <ul class="list-group">
                                                <?php foreach ($all_topic as $thesis => $new_topic) :
                                                    if(isset($_GET['TopicID'])) :
                                                        if(in_array(data_clean($new_topic['TopicID']),$_GET['TopicID'])) :
                                                            $check='checked="checked"';
                                                        else : $check="";
                                                        endif;
                                                    endif;
                                                ?>
                                                    <li class="list-group-item">
                                                        <!--<div class="checkbox form-group"><label><input type="checkbox" value="<?=data_clean($new_topic['TopicID']);?>" <?=@$check?> name="TopicID[]" class="sort_rang TopicID"><?=ucfirst($new_topic['TopicID']); ?></label></div>-->
                                                        <div class="checkbox form-group "><label><input type="checkbox" value="<?=data_clean($new_topic['TopicID']);?>" <?=@$check?> name="TopicID[]" class="sort_rang TopicID"><?=ucfirst($new_topic['TopicName']); ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                        else
                                        {?>
                                            <div class="panel-body collapse out" id="panelOne">
                                                <ul class="list-group">
                                                <?php foreach ($all_topic as $thesis => $new_topic) :
                                                    if(isset($_GET['TopicID'])) :
                                                        if(in_array(data_clean($new_topic['TopicID']),$_GET['TopicID'])) :
                                                            $check='checked="checked"';
                                                        else : $check="";
                                                        endif;
                                                    endif;
                                                ?>
                                                    <li class="list-group-item">
                                                        <!--<div class="checkbox form-group"><label><input type="checkbox" value="<?=data_clean($new_topic['TopicID']);?>" <?=@$check?> name="TopicID[]" class="sort_rang TopicID"><?=ucfirst($new_topic['TopicID']); ?></label></div>-->
                                                        <div class="checkbox form-group "><label><input type="checkbox" value="<?=data_clean($new_topic['TopicID']);?>" <?=@$check?> name="TopicID[]" class="sort_rang TopicID"><?=ucfirst($new_topic['TopicName']); ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                    ?>
                                </div>
                                <div class="panel list">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" data-toggle="collapse" data-target="#panelTwo" aria-expanded="true">Grupo de Investigación
                                            <a data-toggle="collapse" href="#panelTwo">
                                                <i class="pull-right indicator fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <?php
                                        if(!empty($_GET['ResearchGroupID']))
                                        {?>
                                            <div class="panel-body collapse in" id="panelTwo">
                                                <ul class="list-group">
                                                <?php foreach ($all_group as $thesis => $new_group) :
                                                    if(isset($_GET['ResearchGroupID'])) :
                                                        if(in_array(data_clean($new_group['ResearchGroupID']),$_GET['ResearchGroupID'])) :
                                                            $group_check='checked="checked"';
                                                        else : $group_check="";
                                                        endif;
                                                    endif;
                                                ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_group['ResearchGroupID']); ?>" <?=@$group_check?>  name="ResearchGroupID[]" class="sort_rang ResearchGroupID"><?=ucfirst($new_group['ResearchGroupName']); ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                        else
                                        {?>
                                            <div class="panel-body collapse out" id="panelTwo">
                                                <ul class="list-group">
                                                <?php foreach ($all_group as $thesis => $new_group) :
                                                    if(isset($_GET['ResearchGroupID'])) :
                                                        if(in_array(data_clean($new_group['ResearchGroupID']),$_GET['ResearchGroupID'])) :
                                                            $group_check='checked="checked"';
                                                        else : $group_check="";
                                                        endif;
                                                    endif;
                                                ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=data_clean($new_group['ResearchGroupID']); ?>" <?=@$group_check?>  name="ResearchGroupID[]" class="sort_rang ResearchGroupID"><?=ucfirst($new_group['ResearchGroupName']); ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                    ?>
                                </div>
                                <div class="panel list">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" data-toggle="collapse" data-target="#panelThree" aria-expanded="true">Línea de Investigación
                                            <a data-toggle="collapse" href="#panelThree">
                                                <i class="pull-right indicator fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <?php
                                        if(!empty($_GET['ResearchLineID']))
                                        {?>
                                            <div class="panel-body collapse in" id="panelThree">
                                                <ul class="list-group">
                                                    <?php foreach ($all_line as $thesis => $new_line) :
                                                        if(isset($_GET['ResearchLineID'])) :
                                                            if(in_array($new_line['ResearchLineID'],$_GET['ResearchLineID'])) :
                                                                $line_check='checked="checked"';
                                                            else : $line_check="";
                                                            endif;
                                                        endif;
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_line['ResearchLineID']; ?>" <?=@$line_check?>  name="ResearchLineID[]" class="sort_rang ResearchLineID"><?=$new_line['ResearchLineName']; ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                        else
                                        {?>
                                            <div class="panel-body collapse out" id="panelThree">
                                                <ul class="list-group">
                                                    <?php foreach ($all_line as $thesis => $new_line) :
                                                        if(isset($_GET['ResearchLineID'])) :
                                                            if(in_array($new_line['ResearchLineID'],$_GET['ResearchLineID'])) :
                                                                $line_check='checked="checked"';
                                                            else : $line_check="";
                                                            endif;
                                                        endif;
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_line['ResearchLineID']; ?>" <?=@$line_check?>  name="ResearchLineID[]" class="sort_rang ResearchLineID"><?=$new_line['ResearchLineName']; ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                    ?>
                                </div>
                                <div class="panel list">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" data-toggle="collapse" data-target="#panelFour" aria-expanded="true">Perfil de Estudiante
                                            <a data-toggle="collapse" href="#panelFour">
                                                <i class="pull-right indicator fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <?php
                                        if(!empty($_GET['EducativeProgramID']))
                                        {?>
                                            <div class="panel-body collapse in" id="panelFour">
                                                <ul class="list-group">
                                                    <?php foreach ($all_program as $thesis => $new_program) :
                                                        if(isset($_GET['EducativeProgramID'])) :
                                                            if(in_array($new_program['EducativeProgramID'],$_GET['EducativeProgramID'])) :
                                                                $program_check='checked="checked"';
                                                            else : $program_check="";
                                                            endif;
                                                        endif;
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_program['EducativeProgramID']; ?>" <?=@$program_check?>  name="EducativeProgramID[]" class="sort_rang EducativeProgramID"><?=$new_program['EducativeProgramName']; ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                        else
                                        {?>
                                            <div class="panel-body collapse out" id="panelFour">
                                                <ul class="list-group">
                                                    <?php foreach ($all_program as $thesis => $new_program) :
                                                        if(isset($_GET['EducativeProgramID'])) :
                                                            if(in_array($new_program['EducativeProgramID'],$_GET['EducativeProgramID'])) :
                                                                $program_check='checked="checked"';
                                                            else : $program_check="";
                                                            endif;
                                                        endif;
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_program['EducativeProgramID']; ?>" <?=@$program_check?>  name="EducativeProgramID[]" class="sort_rang EducativeProgramID"><?=$new_program['EducativeProgramName']; ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                    ?>
                                </div>
                                <div class="panel list margin-bottom-0">
                                    <div class="panel-heading">
                                        <h3 class="panel-title" data-toggle="collapse" data-target="#panelFive" aria-expanded="true">Asesor
                                            <a data-toggle="collapse" href="#panelFive">
                                                <i class="pull-right indicator fa fa-caret-down" aria-hidden="true"></i>
                                            </a>
                                        </h3>
                                    </div>
                                    <?php
                                        if(!empty($_GET['ResearcherID']))
                                        {?>
                                            <div class="panel-body collapse in" id="panelFive">
                                                <ul class="list-group">
                                                    <?php foreach ($all_researcher as $thesis => $new_researcher) :
                                                        if(isset($_GET['ResearcherID'])) :
                                                            if(in_array($new_researcher['ResearcherID'],$_GET['ResearcherID'])) :
                                                                $researcher_check='checked="checked"';
                                                            else : $researcher_check="";
                                                            endif;
                                                        endif;
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_researcher['ResearcherID']; ?>" <?=@$researcher_check?>  name="ResearcherID[]" class="sort_rang ResearcherID"><?=$new_researcher['ResearcherName']; ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                        else
                                        {?>
                                            <div class="panel-body collapse out" id="panelFive">
                                                <ul class="list-group">
                                                    <?php foreach ($all_researcher as $thesis => $new_researcher) :
                                                        if(isset($_GET['ResearcherID'])) :
                                                            if(in_array($new_researcher['ResearcherID'],$_GET['ResearcherID'])) :
                                                                $researcher_check='checked="checked"';
                                                            else : $researcher_check="";
                                                            endif;
                                                        endif;
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="checkbox"><label><input type="checkbox" value="<?=$new_researcher['ResearcherID']; ?>" <?=@$researcher_check?>  name="ResearcherID[]" class="sort_rang ResearcherID"><?=$new_researcher['ResearcherName']; ?></label></div>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div><?php
                                        }
                                    ?>
                                </div>
                            </div>
                            </aside>
                            <!-- /.SIDEBAR -->
                            <section class="col-lg-9 col-md-8">
                                <div class="row">
                                    <div id="results"></div>
                                    <center>
                                        <div class="loader" style="margin-bottom: 20px"></div>
                                    </center>
                                </div>
                            </section>

                        </div>
                    </form>
                </div>
                <!-- CONTENT -->
            </div>
        </div>
    </div>

    <!-- BEGIN PRE-FOOTER -->

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

    <!-- BEGIN SCRIPTS FILTERS IMPORTS -->
    <script src="assets/corporate/scripts/script.js" type="text/javascript"></script>
    <!-- END SCRIPTS FILTERS IMPORTS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initUniform();
            //Layout.initTwitter();
            //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            //Layout.initNavScrolling();
        });
    </script>

    <!-- BEGIN SCRIPTS FILTERS -->
    <script type="text/javascript">
    $(document).ready(function() {
        var total_record = 0;
        var topic = check_box_values('TopicID');
        var group = check_box_values('ResearchGroupID');
        var line =  check_box_values('ResearchLineID');
        var program = check_box_values('EducativeProgramID');
        var researcher = check_box_values('ResearcherID');
        var total_groups = <?php echo $total_data; ?>;
        $('#results').load("autoload.php?group_no="+total_record+"&TopicID="+topic+"&ResearchGroupID="+group+"&ResearchLineID="+line+"&EducativeProgramID="+program+"&ResearcherID="+researcher,  function() {
            total_record++;
        });
        $(window).scroll(function() {
            //alert($(window).height());
            //alert($(document).height());
            //alert($(window).scrollTop());
            //if ($(window).scrollTop() + $(window).height() > $(document).height() - 600)
            if($(window).scrollTop() + $(window).height() === $(document).height())
            {
                if(total_record <= total_groups)
                {
                    loading = true;
//                        $('.loader').show();
      //              $(".loader").html("<img src='assets/pages/img/works/loader.gif' style='margin-top: 50px; margin-bottom: 50px;'/>");
                    $.get("autoload.php?group_no="+total_record+"&TopicID="+topic+"&ResearchGroupID="+group+"&ResearchLineID="+line+"&EducativeProgramID="+program+"&ResearcherID="+researcher,
                    function(data){
                    if (data != "") {
                        $("#results").append(data);
//                            $('.loader').hide();
                        $('.loader').empty();
                        total_record++;
                    }
                    });
                }
                    // total_record ++;
                    //alert('termino de cargar');
            }
        });
        function check_box_values(check_box_class){
            var values = new Array();
                $("."+check_box_class+":checked").each(function() {
                   values.push($(this).val());
                });
            return values;
        }
        $('.sort_rang').change(function(){
            $("#search_form").submit();
            return false;
        });
    });
    </script>
    <!-- END SCRIPTS FILTERS -->

    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>

<!-- END BODY -->
</html>
<?php
include('footer.php');
include('assets/pages/modals/Researcher/profile-teacher.php');
?>
