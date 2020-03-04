<?php
  include __DIR__."/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connection failed: " . $conn->connect_error;
    }
    $sql = "SELECT * FROM stanze";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor']."\n";
    }
    } elseif ($result) {
    echo "0 results";
    } else {
    echo "query error";
    }
  $conn->close();
