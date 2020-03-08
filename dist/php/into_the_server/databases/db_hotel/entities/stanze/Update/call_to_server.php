<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connessione non riuscita: " . $conn->connect_error;
      die();
    }
    $room_id = $_POST['id'];
    $room_number = $_POST['room_number'];
    $room_floor = $_POST['floor'];
    $room_beds = $_POST['beds'];
    if (empty($room_id)) {
      $error_modify_room_id = 'Non hai inserito un id valido';
      echo $error_modify_room_id;
      die();
    }
    if (empty($room_number)) {
      $error_modify_room_number_ = 'Non hai inserito un numero di stanza valido';
      echo $error_modify_room_number;
      die();
    }
    if (empty($room_floor)) {
      $error_modify_room_floor = 'Non hai inserito un numero di piano valido';
      echo $error_modify_room_floor;
      die();
    }
    if (empty($room_beds)) {
      $error_modify_room_beds = 'Non hai inserito un numero di letti valido';
      echo $error_modify_room_beds;
      die();
    }
    $sql = "UPDATE stanze SET stanze.room_number = $room_number, stanze.floor = $room_floor, stanze.beds = $room_beds, stanze.updated_at = CURRENT_TIMESTAMP WHERE stanze.id = $room_id";
    $result = $conn->query($sql);
    if ($result) {
    echo "Stanza Modificata. Tra qualche secondo verrai reindirizzato alla pagina contenente le informazioni della stanza...";
    } else {
    echo "Errore nella modifica della stanza. Riprovare. (Reindirizzamento...)";
    }
  $conn->close();
  header("refresh:3; url=http://localhost/mamp_public/php-hotel-crud/dist/php/into_the_server/databases/db_hotel/entities/stanze/read/read_selected_room_info.php?id=$room_id");
?>
