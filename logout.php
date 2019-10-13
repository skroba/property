<?php
session_start();
unset($_SESSION['role']);
session_destroy();
header();
header("Location:/");

