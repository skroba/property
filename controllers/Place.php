<?php
class Place extends Controller {

    public static function index(){
        $auth = ['user', 'admin'];
        $dbc = new DAO;
        $result = $dbc->townList();
        return Controller::view('townlist',$result, $auth);
    }
    public static function createtown($newtown){
        if (!empty($newtown)) {
            $dbc = new DAO;
            $dbc->townInsert(ucfirst($newtown));
            header('Location:/place/index');
        } else {
            header('Location:/place/index');
        }
        

    }


    public static function createblock($town, $block){
        $auth = ['user', 'admin'];
        $dbc = new DAO;
        $result = $dbc->townSelect($town);
        if(isset($result['blocks'])){
        $dbc->blockInsert($result['blocks'].','.$block, $town);
        return Controller::view('townlist');
        }else{
        $dbc->blockInsert($block, $town);
        return Controller::view('townlist');
        die();
        }
    }
}
