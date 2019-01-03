<?php
    include_once 'assets/code/include/db_connection.php';

    $content_per_page = 3;
    $group_no  = strtolower(trim(str_replace("/","",$_REQUEST['group_no'])));
    $start = ceil($group_no * $content_per_page);
    $sql= "SELECT distinct * FROM `thesis` as T INNER JOIN status as S ON T.StatusID = S.StatusID WHERE Category = '1'";

    if(isset($_REQUEST['TopicID']) && $_REQUEST['TopicID']!="") :
                $topic = explode(',',url_clean($_REQUEST['TopicID']));
        $sql.=" AND TopicID IN ('".implode("','",$topic)."')";
    endif;

    if(isset($_GET['ResearchGroupID']) && $_GET['ResearchGroupID']!="") :
		$group = explode(',',url_clean($_REQUEST['ResearchGroupID']));
        $sql.=" AND ResearchGroupID IN ('".implode("','",$group)."')";
    endif;

    if(isset($_GET['ResearchLineID']) && $_GET['ResearchLineID']!="") :
		$line = explode(',',$_REQUEST['ResearchLineID']);
        $sql.=" AND ResearchLineID IN (".implode(',',$line).")";
    endif;

    if(isset($_GET['EducativeProgramID']) && $_GET['EducativeProgramID']!="") :
		$program = explode(',',$_REQUEST['EducativeProgramID']);
        $sql.=" AND EducativeProgramID IN (".implode(',',$program).")";
    endif;

    if(isset($_GET['ResearcherID']) && $_GET['ResearcherID']!="") :
		$researcher = explode(',',$_REQUEST['ResearcherID']);
        $sql.=" AND ResearcherID IN (".implode(',',$researcher).")";
    endif;

    $sql.=" LIMIT $start, $content_per_page";
    $all_thesis = $connection->query($sql);
    $rowcount = mysqli_num_rows($all_thesis);
    // echo $sql; exit;

    function url_clean($String)
    {
    	return str_replace('_',' ',$String);
    }
?>

<!--
--
-- Developed by: Ing. Jorge Luis Aguirre Martínez & Ing. Alan Ulises Montes Rodríguez
-- © October 15, 2017 Derechos Reservados, Universidad de Colima.
--
-->

<!-- LISTING -->


<?php if(isset($all_thesis) && count($all_thesis) && $rowcount > 0) : $i = 0; ?>
    <?php foreach ($all_thesis as $thesis => $_SESSION['thesis']) : ?>
        <article class="col-md-4 col-sm-4">
            <div class="pricing hover-effect">
                <div class="pricing-head">
                    <h3>Tesis
                    <span>
                        <?php echo $_SESSION['thesis']['StatusName']; ?>
                    </span>
                    </h3>
                    <span>
                    <figure>
                        <a><img style="height: 245px; width:100%; padding-top: 10px;" src="<?php echo $_SESSION['thesis']['Image']; ?>" alt="<?php echo $_SESSION['thesis']['ThesisName']; ?>" style="margin-top: 20px;"/></a>
                    </figure>
                    </span>
                    </h4>
                </div>
                <div class="pricing-footer">
                    <p class="thesis-name">
                        <?php echo $_SESSION['thesis']['ThesisName']; ?>
                    </p>
                    <a href="inside.php?thesis_id=<?php echo $_SESSION['thesis']['ThesisID']; ?>" class="btn btn-primary">
                        Ver más <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div>
        </article>
    <?php $i++; endforeach; ?>
<?php endif; ?>
<!-- /.LISTING -->
