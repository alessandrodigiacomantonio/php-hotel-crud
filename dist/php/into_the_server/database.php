<?php
  include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connection failed: " . $conn->connect_error;
    }
    // $sql = "SELECT id, room_number, floor FROM stanze";
    // $result = $conn->query($sql);
    // if ($result && $result->num_rows > 0) {
    //   $rooms = [];
    // while($row = $result->fetch_assoc()) {
    //   $rooms[] = $row;
    //   var_dump($row);
    //   echo $row['id'];
    // }
    // var_dump($rooms);
    $sql = "SELECT room_number, floor FROM stanze";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor'];
    }
    } elseif ($result) {
    echo "0 results";
    } else {
    echo "query error";
    }
  $conn->close();
