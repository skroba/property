<?php

require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/header.php';




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ubacite novo mesto</title>
  </head>
  <body>
    <div class="container">
    <h4 class="pt-4 pb-4" >Ovde mozete dodati novi grad ili ubaciti novo naselje za postojeci</h4>
    <form action="/place/createblock" method="post">

    <select class="form-control" id="selectedTown" name="townlist">
    <option selected disabled>Izaberite grad</option>
            <?php

foreach ($_SESSION['data'] as $key) {
    echo '<option value ="';
    echo $key['town'];
    echo '">';
    echo $key['town'];
    echo '</option>';

}
?>
        </select>
        <div class="form-group">
    <label class="pt-4" for="exampleInputEmail1">Novi blok:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Unesito novi blok za izabrani grad" name="blockInsert">
  </div>

  <button type="submit" class="btn btn-primary">Unesi novi blok</button>
</form>





    <form action="/place/createtown" method="post">
  <div class="form-group">
    <label class="pt-4" for="exampleInputEmail1">Novi grad:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Unesito novo mesto" name="townInsert">
  </div>

  <button type="submit" class="btn btn-primary">Unesi novi grad</button>
</form>

    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/footer.php';?>
