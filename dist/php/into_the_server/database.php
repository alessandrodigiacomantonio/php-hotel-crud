<?php
  include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connection failed: " . $conn->connect_error;
      die();
    }
    $sql = "SELECT id, room_number, floor FROM stanze";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
      $rooms = [];
      while($row = $result->fetch_assoc()) {
        $rooms[] = $row;
        // echo $row[id];
      }
    } elseif ($result) {
    echo "0 results";
    } else {
    echo "query error";
    }
  $conn->close();
