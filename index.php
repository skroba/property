<?php
session_start();
require_once 'model/DAO.php';
require_once 'controllers/Controller.php';
require_once 'controllers/Property.php';
require_once 'controllers/User.php';
require_once 'controllers/Place.php';

$fullUrl = $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = ltrim($fullUrl, 'https://eea443bf.ngrok.io');
$path = parse_url($fullUrl);

switch ($path['path']) {

    case '/':
        Property::index();
        break;

    case '/property/create':
        Property::create();
        break;

    case '/property/store':
        Property::store();
        break;

    case '/show/':
        Property::show($path['query']);
        break;

    case '/property/edit/':
        Property::edit($path['query']);
        break;

    case '/user/login':
        User::index();
        break;

    case '/logincontroller':
        User::login();
        break;

    case '/user/register':
        User::register();
        break;

    case '/place/index':
        Place::index();
        break;

    case '/place/createtown':
        Place::createtown($_POST['townInsert']);
        break;

    case '/place/createblock':
        Place::createblock($_POST['townlist'],$_POST['blockInsert']);
        break;
    case '/search':
        Place::createblock($_POST['townlist'],$_POST['blockInsert']);
        break;
    case '/property/search':
        Property::search();
        break;
    case '/property/search/':
        Property::search($path['query']);
        break;

    case '/user/create':
        User::create();
        break;
    case '/salt.php':
        User::authenticateEmail($path['query']);
        break;

    default:
        print_r($path);
        break;
}