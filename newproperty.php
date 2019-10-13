<?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/header.php';?>



<div class="container">

  <form action="/property/store" method="post" enctype="multipart/form-data">



    <div class="form-group">
      <label for="exampleFormControlFile1">Ubacite fotografije</label>
      <input type="file" name="files[]" class="form-control-file" id="file" multiple>
    </div>
    <select class="form-control" id="selectedTown" name="townlist" onchange="showUser(this.value)">
    <option selected disabled>Izaberite grad</option>
            <?php

foreach ($_SESSION['data'] as $key) {
    echo '<option value ="';
    echo $key['town'];
    echo '">';
    echo $key['town'];
    echo '</option>';}

?>
        </select>



        <div id="txtHint"><b>Izaberite grad da bi mogli da izaberete naselje</b></div>



<div class="row">
    <div class="col-9 form-group">
      <label for="street">Ulica</label>
      <input type="text" class="form-control" id="location" placeholder="Ulica" value="" name="street" required>
      </div>
      <div class=" col-3 form-group">
          <label for="room">Broj Soba</label>
          <input type="text" class="form-control" id="space" placeholder="Broj soba" value="" name="room" required>
        </div>
    
    </div>

    <div class="row">
      <div class="col-sm">
        <div class="form-group">
          <label for="space">Povrsina</label>
          <input type="text" class="form-control" id="space" placeholder="Povrsina" value="" name="space" required>
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Kuca ili stan</label>
          <select class="form-control" id="type" name="type" >
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
          <input class="form-check-input" type="radio" name="rentorsell" id="exampleRadios1" value="sell" checked="">
          <label class="form-check-label" for="exampleRadios1" >
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
          <input class="form-check-input" type="radio" name="garage" id="exampleRadios2" value="no" checked="">
          <label class="form-check-label" for="exampleRadios4" >
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
          <input class="form-check-input" type="radio" name="elevator" id="exampleRadios2" value="no" checked="">
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
          <input type="text" name="price" class="form-control" id="vlasnik" placeholder="Cena" value="" required>
        </div>
      </div>
      <div class="col-sm">
        <div class="form-group">
          <label for="owner">Vlasnik</label>
          <input type="text" name="owner" class="form-control" id="vlasnik" placeholder="Vlasnik" value="" required>
        </div>
      </div>
      
    </div><!-- closed div row-->
    <div class="row">
    <div class="col-sm">
        <div class="form-group">
          <label for="about">O stanu</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="about" required></textarea>
        </div>
      </div>
    </div>
    
      <button type="submit" class="btn btn-primary">Ubaci</button>
  </form>

</div>

<?php require 'view/partials/footer.php';?>