<?php
require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/header.php';

?>


  <div class="featured position-relative">
  <img src="/uploads/images/1.jpg" class="d-block w-100" alt="...">
  <div class="search-box">
  <form action="/property/search" method="post" enctype="multipart/form-data">
  <div class="col"><h4>Pretraga:</h4></div>
    <div class="row">
    
      <div class="col">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rentorsell" id="exampleRadios1" value="sell" checked="">
          <label class="form-check-label" for="exampleRadios1" >
            Prodaja
          </label>
        </div>
      </div>
      <div class="col">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="rentorsell" id="exampleRadios2" value="rent">
          <label class="form-check-label" for="exampleRadios2">
            Izdavanje
          </label>
        </div>
      </div>
      </div><!-- closed div col-sm -->
      <div class="col-sm">
        <div class="form-group">
          <select class="form-control" id="town" name="town" onchange="showUser(this.value)">
          <option selected disabled>Izaberite grad</option>
          <?php
foreach ($_SESSION['data'] as $key => $value) {
    $town[] = $value['town'];

}
$town = (array_unique($town));

foreach ($town as $key) {
    echo '<option value ="';
    echo $key;
    echo '">';
    echo $key;
    echo '</option>';}

?>
          </select>
        </div>
        
        <div id="txtHint"><b></b></div>
      </div>
      <div class="row p-2"><!--  div row32 -->
        <div class="col-sm"> <label class="form-check-label" for="room">
            Broj soba
          </label>
        <input type="text" name="room" class="form-control" id="sitelink" aria-describedby="sitelink">

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
      </div><!-- closed div row32 -->
      <button type="submit" class="btn btn-primary  srchbtn">Trazi</button>
</form>
  </div>
</div>
<div class="nesto">
    <h4>Nove nekretnine:</h4>
</div>


<div class="row">

<?php
foreach ($_SESSION['data'] as $result): ?>
<?php
$images = json_decode($result['images']);
foreach ($images as $image) {
    $img[] = $image;
}
?>


    <div class="col single-prop">

            <div class="name-single">
                <h5><?php echo $result['town'] . ', ' . $result['street'] ?></h5>
            </div>

            <div class="image-single">
            <a href="<?php echo '/show/?' . $result['uploaded'] ?>"><img src="../../uploads/images/<?php echo $result['uploaded'] ?>/small-<?php echo $img['1'] ?>" alt=""></a>
            </div>

            <div class="data-single">
            <table class="table table-sm">

            <tbody>
                <tr>
                <td><span>Kvadratura:</span></td>
                <td><?php echo $result['space'] ?></td>
                </tr>
                <tr>
                <td><span>Cena:</span></td>
                <td><?php echo $result['price'] ?></td>
                </tr>
                <tr>
                <td><span>Grejanje:</span></td>
                <td><?php echo $result['heating'] ?></td>
                </tr>
                <tr>
                <td><span>Soba:</span></td>
                <td><?php echo $result['room'] ?></td>
                </tr>
                <tr>
                <td><span><?php echo ($result['rentorsell'] =='rent' ) ? 'Za rentiranje' : 'Na prodaju' ; ?> </span></td>
                <td></td>
                </tr>
                <tr>
                <td>
                    <div class="social-single">
                         <p>Social: <i class="fab fa-facebook-square"></i> <i class="fab fa-instagram"></i> <i class="fab fa-twitter-square"></i></p>
                    </div>
                </td>
                <td></td>
                </tr>
            </tbody>

            </table>

        </div>



    </div>

<?php endforeach?>

</div><!--row-->

<div class="row">
<a href="/property/search/?rentorsell=sell" class="w-100 col-3"> <div class=" square-links" ><span class="myButton" id="myButton" >Prodaja</span></div></a>  
<a href="/property/search/?rentorsell=rent" class="w-100 col-3"> <div class=" square-links" ><span class="myButton" id="myButton" >Izdavanje</span></div></a>  
<a href="/property/search/?type=kuca" class="w-100 col-3"> <div class=" square-links" ><span class="myButton" id="myButton" >Kuce</span></div></a>   
<a href="/property/search/?type=stan" class="w-100 col-3"> <div class=" square-links" ><span class="myButton" id="myButton" >Stanovi</span></div></a>
   
   

</div>

<hr>
<div class="row">
    <div class="col-8">
    1914 translation by H. Rackham

<h1>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and.</h1> I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"
Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC

    </div>
    <div class="col-4">
    1914 translation by H. Rackham

"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"

    </div>
</div>

<?php
require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/footer.php';
?>
