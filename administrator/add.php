<?php
    include_once '../assets/code/include/db_connection.php';
    if (isset($_POST['newTopic']))
        {
          global $connection;
          $action= $_POST['newTopic'];
          $sql = "INSERT into topic(`TopicName`)values('$action')";
          if ($connection->query($sql) === TRUE) {
            echo "Funciono";
             } else {
               echo "error";
            }
           $connection->close();
        }
?>
