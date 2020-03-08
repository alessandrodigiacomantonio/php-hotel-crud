<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connessione non riuscita: " . $conn->connect_error;
      die();
    }
    $room_number = $_POST['room_number'];
    $room_floor = $_POST['floor'];
    $room_beds = $_POST['beds'];
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
    $now = getdate(time()+3600);
    $curr_year = $now['year'];
    $curr_month = $now['mon'];
    $curr_day = $now['wday'];
    $curr_hours = $now['hours'];
    $curr_minutes = $now['minutes'];
    $curr_seconds = $now['seconds'];
    $curr_date = $curr_year.'-'.$curr_month.'-'.$curr_day.' '. $curr_hours.':'.$curr_minutes.':'.$curr_seconds;
    $date = date_create($curr_date);
    $date = date_format($date, 'Y-m-d H:i:s');
    $stmt = $conn->prepare("INSERT INTO stanze (room_number,
    floor, beds, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("siiss", $room_number, $room_floor, $room_beds, $date, $date);
    $stmt->execute();
    $sql = "SELECT MAX(stanze.id) id FROM stanze";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
      $room_id = $result->fetch_assoc();
      echo "Stanza aggiunta con suddesso. Tra qualche secondo verrai reindirizzato alla pagina contenente le informazioni relative alla nuova stanza.";
    } else {
    echo "Errore nell'aggiunta della nuova stanza. Riprova.";
    }
  $conn->close();
  header("refresh:5; url=http://localhost/mamp_public/php-hotel-crud/dist/php/into_the_server/databases/db_hotel/entities/stanze/read/read_selected_room_info.php?id=$room_id[id]");
?>
