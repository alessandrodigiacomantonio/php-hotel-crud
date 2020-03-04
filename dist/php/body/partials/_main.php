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
        ?>
        <td>
          <form action="">
            <input type="hidden" name="" value="">
            <input class="btn-primary" type="submit" name="" value="Show">
          </form>
        </td>
        <td>
          <form action="">
            <input type="hidden" name="" value="">
            <input class="btn-secondary" type="submit" name="" value="Update">
          </form>
        </td>
        <td>
          <form action="">
            <input type="hidden" name="" value="">
            <input class="btn-danger" type="submit" name="" value="Delete">
          </form>
        </td>
        <?php
          }
        ?>
      </tr>
    </tbody>
  </table>


</main>
