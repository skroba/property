<?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/header.php';?>
<div class="row">
<?php
$images = json_decode($_SESSION['data']['images']);
foreach ($images as $image) {
    $img[] = $image;
}
?>
    <div class="col single-prop">
            <div class="name-single">
                <h4><?php echo $_SESSION['data']['town'] .', ' .$_SESSION['data']['street']?></h4>
            </div>
            <div class="row">
             <?php foreach ($images as $image): ?>
             <div class="col">
            <div class="image-single ">
            <img src="../../uploads/images/<?php echo $_SESSION['data']['uploaded'] ?>/small-<?php echo $image ?>" alt="">
            </div>
            </div>
            <?php endforeach?>
            </div>
            <div class="data-single">
            <table class="table table-sm">

            <tbody>
            <tr>
                <td><span>Cena:</span></td>
                <td><?php echo $_SESSION['data']['price'] ?></td>
                </tr>
                <tr>
                <td><span>Kvadratura:</span></td>
                <td><?php echo $_SESSION['data']['space'] ?></td>
                </tr>
                <tr>
                <td><span>Soba:</span></td>
                <td>4</td>
                </tr>
                <tr>
                <td><span>Grejanje:</span></td>
                <td><?php echo $_SESSION['data']['heating'] ?></td>
                </tr>
                <tr>
                <td><span>Opis:</span></td>
                <td><?php echo $_SESSION['data']['about'] ?></td>
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
</div><!--row-->

<?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/footer.php';?>

