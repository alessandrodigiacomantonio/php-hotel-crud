<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connessione non riuscita: " . $conn->connect_error;
      die();
    }
    $room_id = $_POST['id'];
    if (!empty($room_id)) {
      $sql = "DELETE FROM stanze WHERE stanze.id = $room_id";
      $result = $conn->query($sql);
    }
  $conn->close();
    header("Location: http://localhost/mamp_public/php-hotel-crud");
?>
