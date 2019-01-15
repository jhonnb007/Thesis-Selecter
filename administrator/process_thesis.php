<?php
  include_once '../assets/code/include/db_connection.php';
  if ($connection->connect_error)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT T.ThesisID, R.ResearcherName, T.ResearcherID, R.ResearcherID, R.EmailAddress, R.TelephoneNumber, R.ResearchGroupID, R.ResearchLineID,  R.RoomID, R.SchoolID, T.ThesisName, L.LevelName, S.StatusName, T.TopicID, TP.TopicName, T.EducativeProgramID, E.EducativeProgramName, T.FundingAgencyAllID, F.FundingAgencyAllName, T.RequirementsALL, T.RequirementsID, RQ.RequirementsName, T.PlazasID, RG.ResearchGroupName, RL.ResearchLineName, RG.ResearchGroupKey, RQ.RequirementsID, T.SupportID, SP.SupportName, T.Assigned, T.Summary, T.Image, U.UniversityName, Sch.SchoolName, RM.RoomName, B.BuildingName, T.ImageIn, R.ImageProfile
        FROM thesis as T INNER JOIN level as L ON T.LevelID = L.LevelID INNER JOIN researcher as R ON T.ResearcherID = R.ResearcherID INNER JOIN status as S ON S.StatusID = T.StatusID INNER JOIN topic as TP ON TP.TopicID = T.TopicID INNER JOIN educative_program as E ON E.EducativeProgramID = T.EducativeProgramID INNER JOIN requirements as RQ ON RQ.RequirementsID = T.RequirementsID INNER JOIN funding_agency_all as F ON F.FundingAgencyAllID = T.FundingAgencyAllID INNER JOIN research_group as RG ON RG.ResearchGroupID = T.ResearchGroupID INNER JOIN research_line as RL ON RL.ResearchLineID = T.ResearchLineID INNER JOIN support as SP ON SP.SupportID = T.SupportID INNER JOIN school as Sch ON Sch.SchoolID = R.SchoolID INNER JOIN university as U ON U.UniversityID = Sch.UniversityID INNER JOIN room as RM ON RM.RoomID = R.RoomID INNER JOIN building as B on B.BuildingID = RM.BuildingID  WHERE Category <> 1 ORDER BY T.ThesisID";

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
