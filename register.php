<?php
require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/header.php';
if (isset($_SESSION['data'])) {
    switch ($_SESSION['data']) {
        case 'empty':
            $registererror = "Please enter data in all fields!";
            break;
        case 'checkpass':
            $registererror = "Please repeat same password!";
            break;
        case 'taken':
            $registererror = "Please chose another username, this is already taken!";
            break;

        default:
            $registererror = "";
            break;
    }
} else {
    $registererror = "";
}

?>

    <h1><?php echo $registererror ?></h1>
    <hr>
      <form action="/user/create" method="POST">
      <div class="row">
      <div class="col-5"><p>Ovde unesite vase podatke kako bi bili u mogucnosti da ubacujete nekretnine na nas sajt:</p></div>

      <div class="col-7 form-group ">

            <label class="pt-3" for="username">Unesite username</label>
            <input type="text" name="username" class="form-control" id="sitelink" aria-describedby="sitelink" placeholder="Enter Username">
            <label class="pt-3" for="password">Unesite password</label>
            <input type="password" name="password" class="form-control" id="sitelink" aria-describedby="sitelink" placeholder="Enter Password">
            <label class="pt-3" for="passwordrepeat">Ponovite password</label>
            <input type="text" name="password-repeat" class="form-control" id="sitelink" aria-describedby="sitelink" placeholder="Repeat Password">
            <label class="pt-3" for="email">Unesite email</label>
            <input type="email" name="email" class="form-control" id="sitelink" aria-describedby="sitelink" placeholder="Enter Email" required>
            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
            <hr>
            <button  type="submit" class="btn btn-primary">Register</button>
          </div>
      </div>


        </form>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/footer.php';?>
