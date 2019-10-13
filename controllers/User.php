<?php
class User extends Controller
{

    public static function index()
    {
        return Controller::view('login', $results = 0);

    }
    public static function register()
    {
        return Controller::view('register', $results = 0);
    }

    public static function login()
    {

        $dbc = new DAO;
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $result = $dbc->usernameExist($_POST['username']);
            if (password_verify($_POST['password'], $result['password'])) {
                $_SESSION['role'] = $result['role'];
                $_SESSION['user'] = $result['username'];
                if (isset($_SESSION['previous'])) {
                    header('Location:'.$_SESSION['previous']);
                } else {
                    Property::index();
                }
                
                
            } else {
                $_SESSION['loginerror'] = 'Uneli ste pogresan username ili password! Pokusajte ponovo.';
                $_SESSION['loginuser'] = $_POST['username'];
                User::index();
            }

        } else {
            $_SESSION['loginerror'] = 'Uneli ste pogresan username ili password! Pokusajte ponovo.';
            User::index();
        }
    }
    public static function create()
    {
        $dbc = new DAO;
        foreach ($_POST as $key => $value) {
            if ($value == '') {
                $error = 'empty';
                Controller::view('register', $error);
                die();
            }
        }
        if ($_POST['password'] != $_POST['password-repeat']) {
            $error = 'checkpass';
            Controller::view('register', $error);
            die();
        }
        if ($dbc->usernameExist($_POST['username'])) {
            $error = 'taken';
            Controller::view('register', $error);
            die();
        } else {
            $salt = bin2hex(random_bytes(8));
            $dbc->usernameInsert($_POST['username'], $pass = password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email'], 'guest', $_POST['csrf'] . $salt);
            $to = 'askrobic@gmail.com';
            $subject = 'New User';
            $message = 'Hello, you can register on our website by visiting ' .
                $_SERVER['DOCUMENT_ROOT'] . '/salt.php/?' . $_POST['csrf'];
            $headers = 'From: askrobic@gmail.com' . "\r\n" .
            'Reply-To: askrobic@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();


            mail($to, $subject, $message, $headers);

            $error = 'Uspesno ste registrovani, proverite email';
            Controller::view('registerok', $error);
        }
        die();

        return Controller::view('register', $results = 0);
    }
    public static function authenticateEmail($salt)
    {
        $dbc = new DAO;
        $result = $dbc->usernameRegister($salt);
        return User::login();

    }
}
