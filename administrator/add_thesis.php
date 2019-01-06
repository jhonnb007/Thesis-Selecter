<?php
include_once '../assets/code/include/db_connection.php';

      global $connection;
      $name = $_POST['addThesisName'];
      $topic = $_POST['addThesisTopic'];
      $plazas = $_POST['addThesisPlaza'];
      $profile = $_POST['addThesisProfile'];
      $agency = $_POST['addThesisAgency'];
      $tecnology = $_POST['addThesisTecnology'];
      $support = $_POST['addThesisSupport'];
      $picture = $_POST['addThesisPicture'];
      $summary = $_POST['addThesisSummary'];
      $researcher = $_POST['researcherID'];
      $group = $_POST['groupID'];
      $line = $_POST['lineID'];


      $sql = "INSERT INTO `thesis` (`ThesisID`, `ThesisName`, `LevelID`, `PlazasID`, `ResearcherID`, `StatusID`, `TopicID`, `EducativeProgramID`, `FundingAgencyID`, `FundingAgencyAllID`, `ResearchGroupID`, `ResearchLineID`, `SupportID`, `ProjectID`, `RequirementsID`, `SscID`, `Assigned`, `Summary`, `Category`, `Image`, `ImageIn`) VALUES (NULL, '$name', '2', '$plazas', '$researcher', '1', '$topic', '$profile', '2', '$agency', '$group', '$line', '$support', NULL, '$tecnology', NULL, '0', '$summary', '2', '$picture', '$picture')";
      if ($connection->query($sql) === TRUE) {
       echo "Solicitd enviada para aprobación";
         } else {
       echo "Error al ingresar datos";
        }
       $connection->close();

?>
