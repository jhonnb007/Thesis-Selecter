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

    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    //echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
    //Salida: Viernes 24 de Febrero del 2012
    
    if (isset($_GET['ca'])){
        $nameCoAsesor = $_GET['ca'];   
    }
    
    $students = get_thesis_students($_SESSION['thesis_id']);
    $rowcount = count($students);
?>
<!DOCTYPE html>
<!--
--
-- Developed by: Ing. Jorge Luis Aguirre Martínez & Ing. Alan Ulises Montes Rodríguez
-- © November 1, 2017 Derechos Reservados, Universidad de Colima.
--
-->
<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
    <meta charset="utf-8">
    <title>Carta de Compromiso</title>
    
    <meta content="Thesis Selector description" name="description">
    <meta content="Thesis Selector keywords" name="keywords">
    <meta content="Jorge Luis Aguirre Martínez" name="author">
    
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <meta name=ProgId content=Word.Document>
    <meta name=Generator content="Microsoft Word 15">
    <meta name=Originator content="Microsoft Word 15">
    <link rel=File-List href="assets/corporate/letter/filelist.xml">
    <link rel=Edit-Time-Data href="assets/corporate/letter/editdata.mso">

    <link href='assets/corporate/img/logos/logo-favicon.png' rel='shortcut icon' type='image/png'> 
    <link href="assets/corporate/css/styleLetter.css" rel="stylesheet">
    <link rel=themeData href="assets/corporate/letter/themedata.thmx">
    <link rel=colorSchemeMapping href="assets/corporate/letter/colorschememapping.xml">

    <script> window.onload=function() { window.print(); } </script>
</head>

<body bgcolor=white lang=ES-MX style='tab-interval:36.0pt'>
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
                                            <?php  echo $students[0]->get_full_name(); ?>
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
                                <b style='mso-bidi-font-weight:normal'><span lang=ES style='font-size:8.0pt;font-family:"Arial",sans-serif;mso-fareast-font-family:Arial;text-transform:uppercase;'>
                                        <?php 
                                            if (isset($nameCoAsesor)){
                                                echo $nameCoAsesor;     
                                            }
                                        ?><o:p></o:p>
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
                                                            <?php  echo $students[0]->get_full_name(); ?><o:p></o:p>
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
</body>
</html>
