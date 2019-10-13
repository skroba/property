<?php
require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/header.php';

$folder = $_SESSION['data']['uploaded'];
$images = json_decode($_SESSION['data']['images']);
?>
    <div class="row">
        <?php foreach ($images as $image): ?>
        <div class="col"><img src="../../uploads/images/<?php echo $folder ?>/small-<?php echo $image ?>" alt=""></div>
        <?php endforeach?>
    </div>

  <form action="/property/store" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleFormControlFile1">Ubacite fotografije</label>
      <input type="file" name="files[]" class="form-control-file" id="file" multiple>
    </div>

    <div class="form-group">
      <label for="location">Lokacija</label>
      <input type="text" class="form-control" id="location" placeholder="Lokacija" value="" name="location">
    </div>

    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label for="space">Povrsina</label>
          <input type="text" class="form-control" id="space" placeholder="Povrsina" value="" name="space">
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kuca ili stan</label>
          <select class="form-control" id="type" name="type">
            <option>Stan</option>
            <option>Kuca</option>
          </select>
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="exampleInputPassword1">Sprat</label>
          <input type="text" class="form-control" id="floors" placeholder="Sprat" value="" name="floors">
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="heating">Grejanje</label>
          <select class="form-control" id="heating" name="heating">
            <option>Centralno</option>
            <option>Gas</option>
            <option>Drva</option>
            <option>Struja</option>
            <option>Drugo</option>
          </select>
        </div>
      </div>
    </div> <!-- closed div row -->
    <div class="row">
      <div class="col-sm">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rentorsell" id="exampleRadios1" value="sell">
          <label class="form-check-label" for="exampleRadios1">
            Prodaja
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rentorsell" id="exampleRadios2" value="rent">
          <label class="form-check-label" for="exampleRadios2">
            Izdavanje
          </label>
        </div>
      </div><!-- closed div col-sm -->
      <div class="col-sm">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="garage" id="exampleRadios1" value="yes">
          <label class="form-check-label" for="exampleRadios3">
            Sa garazom
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="garage" id="exampleRadios2" value="no">
          <label class="form-check-label" for="exampleRadios4">
            Bez garaze
          </label>
        </div>
      </div><!-- closed div col-sm -->
      <div class="col-sm">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="elevator" id="exampleRadios1" value="yes">
          <label class="form-check-label" for="exampleRadios5">
            Sa liftom
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="elevator" id="exampleRadios2" value="no">
          <label class="form-check-label" for="exampleRadios6">
            Bez lifta
          </label>
        </div>
      </div><!-- closed div col-sm -->
    </div><!-- closed div row -->
    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label for="owner">Cena</label>
          <input type="text" name="price" class="form-control" id="vlasnik" placeholder="Cena" value="">
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="owner">Vlasnik</label>
          <input type="text" name="owner" class="form-control" id="vlasnik" placeholder="Vlasnik" value="">
        </div>
      </div>
    </div><!-- closed div col-sm -->
      <button type="submit" class="btn btn-primary">Ubaci</button>
  </form>

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/footer.php';?>