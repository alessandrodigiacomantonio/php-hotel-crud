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
        <?php echo $columnName ?>
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
          <?php echo $data ?>
        </td>
        <?php
          }
        }
      ?>
      </tr>  
    </tbody>
  </table>


</main>
