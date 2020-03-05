<main>
  <?php
    include $_SERVER['DOCUMENT_ROOT']."/mamp_public/php-hotel-crud/dist/php/server.php";
  ?>
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
          $room_id = 0;
          foreach($room as $k => $data) {
            if ($room_id == 0) $room_id = $data;
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
            <input class="btn-primary" type="submit" value="Info Stanza" title="Vedi i dettagli della stanza">
          </form>
        </td>
        <td>
          <form action="">
            <input type="hidden" name="" value="">
            <input class="btn-secondary" type="submit" value="Modifica" title="Modifica le info della stanza">
          </form>
        </td>
        <td>
          <form action="">
            <input type="hidden" name="" value="">
            <input class="btn-danger" type="submit" value="Elimina" title="Elimina stanza">
          </form>
        </td>
        <?php
          }
        ?>
      </tr>
    </tbody>
  </table>
</main>
