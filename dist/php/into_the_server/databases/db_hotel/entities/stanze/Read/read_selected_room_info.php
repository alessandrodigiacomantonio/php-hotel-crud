<?php
  include_once $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/into_the_server/env.php";
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn && $conn->connect_error) {
      echo "Connection failed: " . $conn->connect_error;
      die();
    }
    $room_id = $_GET['id'];
    if (!empty($room_id)) {
      $sql = "SELECT stanze.id 'Codice Stanza', stanze.room_number 'Numero Stanza', stanze.floor 'Piano', stanze.beds 'Numero Posti Letto', configurazioni.title 'Configurazione Letti', stanze.updated_at 'Ultima Modifica' FROM stanze INNER JOIN prenotazioni ON prenotazioni.stanza_id = stanze.id INNER JOIN configurazioni ON configurazioni.id = prenotazioni.configurazione_id WHERE stanze.id = $room_id GROUP BY stanze.id, configurazioni.title";
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
    }
?>

<!DOCTYPE html>
<html lang="en">
  <?php
  include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/head/head.php";
  ?>
  <body>
    <?php include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/body/partials/_header.php"; ?>
    <div class="container">
      <div class="row">
        <table class="table table-dark col-xs-12 m-5">
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
                foreach($room as $k => $data) {
                  if ($k == 'Piano') $data .= '°';
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
      </div>
    </div>
  </body>
</html>
