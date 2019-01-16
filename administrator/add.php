<?php
    include_once '../assets/code/include/db_connection.php';
    if (isset($_POST['newTopic']))
        {
          if (!empty($_POST['newTopic']))
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
        }

        if (isset($_POST['newTecnology']))
            {
              if (!empty($_POST['newTecnology'])) {
                global $connection;
                $action= $_POST['newTecnology'];
                $sql = "INSERT into requirements(`RequirementsName`)values('$action')";
                if ($connection->query($sql) === TRUE) {
                  echo "Funciono";
                   } else {
                     echo "error";
                  }
                 $connection->close();
              }

            }

            if (isset($_POST['newSupport']))
                {
                  if (!empty($_POST['newSupport']))
                  {
                    global $connection;
                    $action= $_POST['newSupport'];
                    $sql = "INSERT into support(`SupportName`)values('$action')";
                    if ($connection->query($sql) === TRUE) {
                      echo "Funciono";
                       } else {
                         echo "error";
                      }
                     $connection->close();
                  }
                }
?>
