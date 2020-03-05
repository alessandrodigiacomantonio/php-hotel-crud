<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connection failed: " . $conn->connect_error;
      die();
    }
    $room_id = $_GET['id'];
    $sql = "SELECT stanze.id 'Codice Stanza', stanze.room_number 'Numero Stanza', stanze.floor 'Piano', title 'Configurazione letti' FROM stanze INNER JOIN prenotazioni ON prenotazioni.stanza_id = stanze.id INNER JOIN configurazioni ON configurazioni.id = prenotazioni.configurazione_id WHERE stanze.id = $room_id GROUP BY stanze.id, stanze.room_number, stanze.floor, configurazioni.title";
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
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/head/head.php";
  ?>
  <body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/body/partials/_header.php"; ?>
    <table class="table">
      <thead>
        <?php
          foreach($rooms[0] as $columnName => $value) {
        ?>
        <th>
          <?php echo $columnName; ?>
        </th>
        <?php
          }
        ?>
      </thead>
      <tbody>
        <?php
          foreach($rooms as $room) {
        ?>
        <tr>
          <?php
            foreach($room as $data) {
          ?>
          <td>
            <?php echo $data; ?>
          </td>
          <?php
            }
          ?>
          <?php
            }
          ?>
        </tr>
      </tbody>
    </table>
  </body>
</html>
