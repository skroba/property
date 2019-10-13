<?php
use Intervention\Image\ImageManagerStatic as Image;

class Property extends Controller
{

    public static function index()
    {
        $auth = ['guest','user', 'admin'];
        $dbc = new DAO;
        $results = $dbc->propertyAll();
        return Controller::view('start', $results);
    }
    public static function create()
    {
        $auth = ['user', 'admin'];
        $dbc = new DAO;
        $results = $dbc->townList();
        return Controller::view('newproperty', $results,$auth);
    }

    public static function store()
    {
// include composer autoload
        require 'vendor/autoload.php';

// import the Intervention Image Manager Class

// configure with favored image driver (gd by default)
        Image::configure(array('driver' => 'gd'));

        $dbc = new DAO;
        $filesjson=[];
//sredjivanje $_FILES array, za svaku fotku vraca objekat
if($_FILES['files']['name'][0]!=0){
        $n = count($_FILES['files']['name']);
        $files = [];
        for ($i = 0; $n > $i; $i++) {
            $files[$i]['name'] = $_FILES['files']['name'][$i];
            $files[$i]['type'] = $_FILES['files']['type'][$i];
            $files[$i]['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $files[$i]['error'] = $_FILES['files']['error'][$i];
            $files[$i]['size'] = $_FILES['files']['size'][$i];
        }

        $filesjson = [];

        $uploaded = time();

        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/' . $uploaded;
        var_dump($target_dir);
        mkdir($target_dir, 0755);
        $uploadOk = 1;

// provera da li je slika prava ili fake

        for ($i = 0; $n > $i; $i++) {
            $check = getimagesize($files[$i]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

// provera da li je slika prevelika
        for ($i = 0; $n > $i; $i++) {
            if ($files[$i]["size"] > 5000000) {
                echo 'Slika je prevelika!';
                echo $files[$i]["name"];
                echo '<br>';
                $uploadOk = 0;

            }

        }
// provera da li je dozvoljen file format
        for ($i = 0; $n > $i; $i++) {
            $imageFileType = strtolower(pathinfo($files[$i]['name'], PATHINFO_EXTENSION));
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                echo "Samo .jpg .jpeg i .png su dozvoljeni!";
                $uploadOk = 0;
            }
        }

//  provera da li je $uploadOk = 0, ako jeste ima gresaka
        if ($uploadOk == 0) {
            echo "Fotografije nisu ubacene u bazu";
// ako je sve ok, probaj da ubacis fotke
        } else {
            for ($i = 0; $n > $i; $i++) {
                echo $target_file = $files[$i]['tmp_name'];
                if (move_uploaded_file($target_file, $target_dir . '/' . $files[$i]['name'])) {
                    $filesjson[] = $files[$i]['name'];
                    $image = Image::make($target_dir . '/' . $files[$i]['name'])->resize(255, null, function ($constraint) {
                        $constraint->aspectRatio();})->save($target_dir . '/small-' . $files[$i]['name']);
                } else {
                    echo "Doslo je do greske.";
                }
            }
        }
            $filesjson = json_encode($filesjson = (object) $filesjson);

            $dbc->propertyInsert(
            $_POST['townlist'],
            $_POST['block'],
            $_POST['street'],
            $_POST['room'], 
            $_POST['space'], 
            $_POST['type'], 
            $_POST['floors'],
            $_POST['heating'],
            $_POST['rentorsell'], 
            $_POST['garage'], 
            $_POST['elevator'],
            $_POST['price'], 
            $_POST['owner'],
            $_POST['about'],
            $_SESSION['user'], 
            $filesjson, $uploaded);
            header("Location:/property/edit/?".$uploaded);


        }

    }
    public static function show($uploaded)
    {
        $dbc = new DAO;
        $results = $dbc->propertyGet($uploaded);
        return Controller::view('showproperty', $results);
    }
    public static function edit($uploaded)
    {
        $dbc = new DAO;
        $results = $dbc->propertyGet($uploaded);
        return Controller::view('editproperty', $results);
    }
    public static function update(){

    }

    public static function search($query=''){
    if(!empty($query)){
        $query = explode('=', $query);
        $query[1]= '\''.$query[1].'\'';

        $query=implode('=',$query);
        $dbc = new DAO;
        $results = $dbc->searchProperty($query);
        return Controller::view('start', $results);
    }else{

    
        $query='';
    $num = count($_POST);
    $i=0;
foreach ($_POST as $key => $value) {
    $i++;
    if(!empty($value)){

         $query .=  $key .' = \''. $value. '\'';
       if ($i<$num) {
        $query .= ' AND ';
       } 
    }
}

 }

 $dbc = new DAO;
 $results = $dbc->searchProperty($query);
 
    // var_dump($results);
    // die();
    return Controller::view('start', $results);
    }
      
    
    public static function destroy()
    {

    }
}
