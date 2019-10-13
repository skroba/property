<?php

if(!isset($_SESSION)) {
  session_start();
  $_SESSION['csrf']= (isset($_SESSION['csrf'])) ? $_SESSION['csrf'] : bin2hex(random_bytes(32));

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"  href="/view/partials/style.css">
    <title><?=isset($headerTitle) ? $headerTitle : 'Property';?></title>
    <script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../xxx2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
  </head>

<body>

<div class="container">



<div class="row header-top-line">
        <div class="col-6">
        <p>Mozete nas dobiti na <strong>063/71-26-206</strong> ili <a href="mailto:askrobic@gmail.com">askrobic@gmail.com</a></p><p>  
        </div>
        <div class="col-3">
        <p>Languages: <a href="#">DE |</a> <a href="#"> IT |</a><a href="#"> EN</a></p>
        </div>
        <div class="col-3">
        <p>Social: <i class="fab fa-facebook-square"></i> <i class="fab fa-instagram"></i> <i class="fab fa-twitter-square"></i></p>
        </div>
</div> <!-- div row -->
 
<div class="row">
    <div class="col-9">
   <a href="/"><img src="/view/partials/images/logo.png" alt="logo"></a>
   </div>
      <div class="col-3">
      <p>Vas username je:<?php echo  isset($_SESSION['user']) ?  $_SESSION['user'] : 'gost' ;?></p>
      </div>
</div><!-- div row -->



    <div class="row index-links">
    <div class="col">

    <a href="/property/create"> Newproperty </a>
    <a href="/place/index"> Newplace </a>
    <a href="/user/login"> Login </a>
    <a href="/user/register">Register</a>
    <a href="/logout.php">Logout</a>
    </div>
    </div>
<div class="row"><hr></div>