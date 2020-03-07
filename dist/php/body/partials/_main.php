<main>
  <?php
    include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/server.php";
  ?>
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
          <th></th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          <?php
            foreach($rooms as $room) {
          ?>
          <tr>
            <?php
              $room_id = 0;
              foreach($room as $k => $data) {
                if ($room_id == 0 && $k == 'Codice Stanza') $room_id = $data;
                if ($k == 'Piano') $data .= '°';
            ?>
            <td>
              <?php echo $data; ?>
            </td>
            <?php
              }
            ?>
            <td>
              <form action="http://localhost/mamp_public/php-hotel-crud/dist/php/into_the_server/databases/db_hotel/entities/stanze/read/read_selected_room_info.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $room_id; ?>">
                <input class="btn btn-info" type="submit" value="Info Stanza" title="Vedi i dettagli della stanza">
              </form>
            </td>
            <td>
              <form action="http://localhost/mamp_public/php-hotel-crud/dist/php/into_the_server/databases/db_hotel/entities/stanze/update/update_selected_room_info.php" method="POST"">
                <input type="hidden" name="id" value="<?php echo $room_id; ?>">
                <input class="btn btn-warning" type="submit" value="Modifica" title="Modifica le info della stanza">
              </form>
            </td>
            <td>
              <form action="">
                <input type="hidden" name="" value="">
                <input class="btn btn-danger" type="submit" value="Elimina" title="Elimina stanza">
              </form>
            </td>
            <?php
              }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>
