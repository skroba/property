<?php 

class Controller extends DAO{


    public static function view($page, $data =[], $auth=[]){
        (isset($_SESSION['role'])) ? $_SESSION['role']: $_SESSION['role']='guest';
        $_SESSION['data'] = $data;


        if(!in_array($_SESSION['role'], $auth) && !empty($auth)){
             $_SESSION['previous'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

            return User::index();
        }else{
            require $page.'.php';;
        }
    }



    // header('Location:'.$page.'.php');
        //     require $page.'.php';
        // }
}
        


