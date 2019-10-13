<?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/header.php';?>
<hr>
<?php

if (!empty($_SESSION['user'])) {
    echo 'Vi ste vec ulogovani kao ' . $_SESSION['user'];
    unset($_SESSION['loginerror']);
    echo '<hr>';
}
if (!empty($_SESSION['loginerror'])) {
    echo $_SESSION['loginerror'];
    unset($_SESSION['loginerror']);
    echo '<hr>';
}
?>
      <form action="/logincontroller" method="POST">
          <div class="form-group">
          <label for="username">Unesite username</label>
            <input type="text" name="username" class="form-control" id="sitelink" aria-describedby="sitelink" placeholder="Enter Username">
            <label for="password">Unesite password</label>
            <input type="text" name="password" class="form-control" id="sitelink" aria-describedby="sitelink" placeholder="Enter Password">
            <input type="hidden" name="csrf" value="<?php echo $csrf ?>">
          </div>
          <a href="/logout.php">Logout</a>
          <button  type="submit" class="btn btn-primary">Login</button>
        </form>

        <?php require $_SERVER['DOCUMENT_ROOT'] . '/view/partials/footer.php';?>