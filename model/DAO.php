<?php

class DB{
    private static $factory;

    public static function createInstance($config = null)
    {
        $settings['dbname'] = 'property';
        $settings['dbhost'] = '127.0.0.1';
        $settings['dbuser'] = 'root';
        $settings['dbpass'] = '';

        try{
            $dsn = 'mysql:dbname=' . $settings['dbname'] . ';host=' . $settings['dbhost'];
            $pdo = new PDO($dsn, $settings['dbuser'], $settings['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            self::$factory[$config] = $pdo;

            return self::$factory[$config];
        }
        catch (PDOException $e) {
            die ('Connection failed: ' . $e->getMessage());
        }
    }
}


class DAO{
    private $db;

    private $search ="SELECT * FROM property WHERE username=?";
    private $usernameExist ="SELECT * FROM users WHERE username=?";
    private $usernameInsert="INSERT INTO users(username, password, email,created_at, role,salt) VALUES (?,?,?,NOW(),?,?)";
    private $usernameRegister="UPDATE users SET role='user' WHERE salt=?";
    private $propertyInsert="INSERT INTO property(town, block, street, room, space, type, floors, heating, rentorsell, garage, elevator, price, owner, about, insertedby, images, uploaded) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    private $propertyGet ="SELECT * FROM property WHERE uploaded=?";
    private $propertyAll ="SELECT * FROM property";
    private $townList = "SELECT * FROM towns ORDER BY town";
    private $townSelect = "SELECT * FROM towns WHERE town = ?";
    private $blockInsert = "UPDATE towns SET blocks=?  WHERE town=?";
    private $townInsert = "INSERT INTO towns (town) VALUES (?)";
    private $searchProperty = "SELECT * FROM property where ";

    public function __construct(){
        $this->db=DB::createInstance();
    }

    public function usernameExist($username){
        $statement = $this->db->prepare($this->usernameExist);
        $statement->bindValue(1,$username);
        $statement->execute();
        $result=$statement->fetch();
        return $result;
    }
    public function propertyGet($uploaded){
        $statement = $this->db->prepare($this->propertyGet);
        $statement->bindValue(1,$uploaded);
        $statement->execute();
        $result=$statement->fetch();
        return $result;
    }
    public function propertyAll(){
        $statement = $this->db->prepare($this->propertyAll);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
    }

    public function usernameInsert($username, $password, $email, $role, $salt){
        $statement = $this->db->prepare($this->usernameInsert);
        $statement->bindValue(1,$username);
        $statement->bindValue(2,$password);
        $statement->bindValue(3,$email);
        $statement->bindValue(4,$role);
        $statement->bindValue(5,$salt);
        $statement->execute();
    }
    public function townInsert($town){
        $statement = $this->db->prepare($this->townInsert);
        $statement->bindValue(1,$town);     
        $statement->execute();
    }
    public function townSelect($town){
        $statement = $this->db->prepare($this->townSelect);
        $statement->bindValue(1,$town);     
        $statement->execute();
        $result=$statement->fetch();
        return $result;
    }
    public function propertyInsert($town, $block, $street, $room, $space, $type, $floors, $heating, $rentorsell, $garage, $elevator, $price, $owner = 'aca',$about, $insertedby, $images, $uploaded){
        $statement = $this->db->prepare($this->propertyInsert);
        $statement->bindValue(1,$town);
        $statement->bindValue(2,$block);
        $statement->bindValue(3,$street);
        $statement->bindValue(4,$room);
        $statement->bindValue(5,$space);
        $statement->bindValue(6,$type);
        $statement->bindValue(7,$floors);
        $statement->bindValue(8,$heating);
        $statement->bindValue(9,$rentorsell);
        $statement->bindValue(10,$garage);
        $statement->bindValue(11,$elevator);
        $statement->bindValue(12,$price);
        $statement->bindValue(13,$owner);
        $statement->bindValue(14,$about);
        $statement->bindValue(15,$insertedby);
        $statement->bindValue(16,$images);
        $statement->bindValue(17,$uploaded);
        $statement->execute();
    }
    public function usernameRegister($salt){
        $statement = $this->db->prepare($this->usernameRegister);
        $statement->bindValue(1,$salt);
        $statement->execute();
    }
    public function townList(){
        $statement = $this->db->prepare($this->townList);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
    }
    public function blockInsert($town, $block){
        $statement = $this->db->prepare($this->blockInsert);
        $statement->bindValue(1,$town);
        $statement->bindValue(2,$block);
        $statement->execute();
    }
    public function searchProperty($query){
        $statement = $this->db->prepare($this->searchProperty.$query);
        $statement->execute();
        $results=$statement->fetchAll();
        return $results;
    }
}