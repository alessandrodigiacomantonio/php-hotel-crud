<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connection failed: " . $conn->connect_error;
      die();
    }
    $sql = "SELECT id 'Codice Stanza', room_number 'Numero Stanza', floor 'Piano' FROM stanze";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
      $rooms = [];
      while($row = $result->fetch_assoc()) {
        $rooms[] = $row;
      }
    } elseif ($result) {
    echo "0 results";
    } else {
    echo "query error";
    }
  $conn->close();
