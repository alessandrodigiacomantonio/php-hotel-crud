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
          <input type="hidden" name="id" value="">
          <div class="form-group">
            <label for="room_number">Numero Stanza</label>
            <input name="room_number" type="text" class="form-control" id="room_number" placeholder="Inserisci il numero della stanza" title="Inserisci il numero della stanza" required>
          </div>
          <div class="form-group">
            <label for="room_floor">Piano</label>
            <input name="floor" type="text" class="form-control" id="room_floor" placeholder="Inserisci il piano" title="Inserisci il piano" required>
          </div>
          <div class="form-group">
            <label for="room_beds">Numero Posti Letto</label>
            <input name="beds" type="text" class="form-control" id="room_beds" placeholder="Inserisci il numero di letti" title="Inserisci il numero di letti" required>
          </div>
          <button type="submit" class="btn btn-primary">Aggiungi Stanza</button>
        </form>
      </div>
    </div>
  </body>
</html>
