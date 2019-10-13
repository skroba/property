<?php
session_start();
require_once 'model/DAO.php';
require_once 'controllers/Controller.php';
require_once 'controllers/Property.php';
require_once 'controllers/User.php';



$_SESSION['csrf']= (isset($_SESSION['csrf'])) ? $_SESSION['csrf'] : bin2hex(random_bytes(8));
