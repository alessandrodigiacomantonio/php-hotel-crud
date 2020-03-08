<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connessione non riuscita: " . $conn->connect_error;
      die();
    }
    $room_id = $_POST['id'];
    if (!empty($room_id)) {
      $sql = "SELECT stanze.id 'Codice Stanza', stanze.room_number 'Numero Stanza', stanze.floor 'Piano', stanze.beds 'Numero Posti Letto', stanze.updated_at 'Ultima Modifica' FROM stanze WHERE stanze.id = $room_id";
      $result = $conn->query($sql);
      if ($result && $result->num_rows > 0) {
        $room = $result->fetch_assoc();
      } elseif ($result) {
      echo "0 results";
      } else {
      echo "query error";
      }
    }
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/head/head.php";
  ?>
  <body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/body/partials/_header.php"; ?>
    <div class="container">
      <div class="row m-5">
        <form action="call_to_server.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $room_id; ?>">
          <div class="form-group">
            <label for="room_number">Numero Stanza</label>
            <input name="room_number" type="text" class="form-control" id="room_number" placeholder="<?php echo $room['Numero Stanza']; ?>" required>
          </div>
          <div class="form-group">
            <label for="room_floor">Piano</label>
            <input name="floor" type="text" class="form-control" id="room_floor" placeholder="<?php echo $room['Piano']; ?>" required>
          </div>
          <div class="form-group">
            <label for="room_beds">Numero Posti Letto</label>
            <input name="beds" type="text" class="form-control" id="room_beds" placeholder="<?php echo $room['Numero Posti Letto']; ?>" required>
          </div>
          <button type="submit" class="btn btn-warning">Salva modifiche</button>
        </form>
      </div>
    </div>
  </body>
</html>
