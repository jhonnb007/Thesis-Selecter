<?php
  include_once '../assets/code/include/db_connection.php';

  if (isset($_POST['deleteID']))
      {
        global $connection;
        $action= $_POST['deleteID'];
        $sql = "UPDATE thesis SET Category='3' WHERE ThesisID=$action";
        if ($connection->query($sql) === TRUE) {
         header("Location: ../administrador.php");
           } else {
         header("Location: ../administrador.php");
          }
         $connection->close();
      }

      if (isset($_POST['modifyID']))
          {
            echo "entro";
            global $connection;
            $id= $_POST['modifyID'];
            $name = $_POST['thesisName'];
            $topic = $_POST['thesisTopic'];
            $profile = $_POST['thesisProfile'];
            $agency = $_POST['thesisAgency'];
            $tecnology = $_POST['thesisTecnology'];
            $support = $_POST['thesisSupport'];
            $summary = $_POST['thesisSummary'];
            echo $id;
            echo $name;

            $sql = "UPDATE `thesis` SET `ThesisName` = '$name', `TopicID` = '$topic', `EducativeProgramID` = '$profile', `FundingAgencyAllID` = '$agency', `SupportID` = '$support', `Summary` = '$summary' WHERE `thesis`.`ThesisID` = '$id'";
            if ($connection->query($sql) === TRUE) {
             echo "resultado bien";
               } else {
                 echo "error";
              }
             $connection->close();
          }

   if (isset($_POST['rejectID']))
       {
         global $connection;
         $action= $_POST['rejectID'];
         $sql = "UPDATE thesis SET Category='3' WHERE ThesisID=$action";
         if ($connection->query($sql) === TRUE) {
          header("Location: ../administrador.php");
            } else {
          header("Location: ../administrador.php");
           }
          $connection->close();
       }

   if (isset($_POST['acceptID']))
       {
         global $connection;
         $action= $_POST['acceptID'];
         $sql = "UPDATE thesis SET Category='1' WHERE ThesisID=$action";
         if ($connection->query($sql) === TRUE) {
         $data = json_encode("Excelente");
           echo $data;
          header("Location: ../administrador.php");
            } else {
          header("Location: ../administrador.php");
           }
          $connection->close();
       }

    if (isset($_POST['revertID']))
       {
         global $connection;
         $action= $_POST['revertID'];
         $sql = "UPDATE thesis SET Category='2' WHERE ThesisID=$action";
         if ($connection->query($sql) === TRUE) {
           $data = json_encode("Excelente");
           echo $data;
          header("Location: ../administrador.php");
            } else {
          header("Location: ../administrador.php");
           }
          $connection->close();
       }


  if ($connection->connect_error)
  {
    die("Connection failed: " . $connection->connect_error);
  }
  $sql = "SELECT T.ThesisID, R.ResearcherName, T.ResearcherID, R.ResearcherID, R.EmailAddress, R.TelephoneNumber, R.ResearchGroupID, R.ResearchLineID,  R.RoomID, R.SchoolID, T.ThesisName, L.LevelName, S.StatusName, T.TopicID, TP.TopicName, T.EducativeProgramID, E.EducativeProgramName, T.FundingAgencyAllID, F.FundingAgencyAllName, T.RequirementsID, RQ.RequirementsName, T.PlazasID, RG.ResearchGroupName, RL.ResearchLineName, RG.ResearchGroupKey, RQ.RequirementsID, T.SupportID, SP.SupportName, T.Assigned, T.Summary, T.Image, U.UniversityName, Sch.SchoolName, RM.RoomName, B.BuildingName, T.ImageIn, R.ImageProfile
        FROM thesis as T INNER JOIN level as L ON T.LevelID = L.LevelID INNER JOIN researcher as R ON T.ResearcherID = R.ResearcherID INNER JOIN status as S ON S.StatusID = T.StatusID INNER JOIN topic as TP ON TP.TopicID = T.TopicID INNER JOIN educative_program as E ON E.EducativeProgramID = T.EducativeProgramID INNER JOIN requirements as RQ ON RQ.RequirementsID = T.RequirementsID INNER JOIN funding_agency_all as F ON F.FundingAgencyAllID = T.FundingAgencyAllID INNER JOIN research_group as RG ON RG.ResearchGroupID = T.ResearchGroupID INNER JOIN research_line as RL ON RL.ResearchLineID = T.ResearchLineID INNER JOIN support as SP ON SP.SupportID = T.SupportID INNER JOIN school as Sch ON Sch.SchoolID = R.SchoolID INNER JOIN university as U ON U.UniversityID = Sch.UniversityID INNER JOIN room as RM ON RM.RoomID = R.RoomID INNER JOIN building as B on B.BuildingID = RM.BuildingID  WHERE Category = 1 ORDER BY T.ThesisID";

  $result = $connection->query($sql);
  if ($result->num_rows >0)
  {
    while($row[] = $result->fetch_assoc())
    {
     $tem = $row;
     $json = json_encode($tem);
    }
  }
  else
  {
    echo "No Results Found.";
  }
  echo $json;
  $connection->close();
?>
