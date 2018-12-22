<?php
  include_once '../assets/code/include/db_connection.php';
  if ($connection->connect_error)
  {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT SupportID, SupportName FROM support";
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
