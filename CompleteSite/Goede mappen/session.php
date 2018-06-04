<?php

//A class to help work whit Sessions
// In our case , primarily to mange logging users in and out

// keep in mind when working whit sessions that it is generally
// inadviseble to store DB-related object in sessions
class Session {

    private $logged_in=false;
    public $user_id;
    public $user_rol;
    public $message;
    public $number;
    public static $clicks;

    function __construct() {
        $this->check_login();
        $this->check_message();
        if($this->logged_in) {
            // actions to take right away if user is logged in
        } else {
            // actions to take right away if user is not logged in
        }

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function is_logged_in() {
        return $this->logged_in;
    }

    public function login($user) {
        // database should find user based on username/password
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->Gebruikers_ID;
            $this->user_rol = $_SESSION['user_rol'] = $user->Gebruikers_Rol;
            $this->logged_in = true;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        unset($this->user_rol);
        $this->logged_in = false;
    }

    public function message($msg="")
    {
        //Kan setten en getten.
        if (!empty($msg)) {
            //Then this is " set message "
            // make sure you understand why $this->message = $msg wouldn't work
            $_SESSION['message'] = $msg;
        } else {
            //Then this is " get message"
            return $this->message;
        }

    }

    private function check_login() {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_rol']))
        {
            $this->user_id = $_SESSION['user_id'];
            $this->user_id = $_SESSION['user_rol'];
            $this->logged_in = true;
        } else {
            unset($this->user_id);
            unset($this->user_rol);
            $this->logged_in = false;
        }
    }

    private function check_message()
    {
        if(isset($_SESSION['message']))
        {
            //Add it as an attribute and erase the stored version
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else{
            $this->message = "";
        }
    }

    public static function clicked($naam){

        if(!isset($_SESSION['number']) && static::checkNaam($naam)){
            $_SESSION['number'] = 1;
        } else if (static::checkNaam($naam)){
            ++$_SESSION['number'];
        }
        static::$clicks = $_SESSION['number'];

        if(static::$clicks >= 3){
            unset($_SESSION['number']);
            unset($_SESSION['naam']);
        }
        if(!isset($_SESSION['number'])){
            return 1;
        }
        return isset($_SESSION['number']) ? $_SESSION['number'] : null;
    }

    public static function getClicked(){
        return static::$clicks;
    }

    private static function checkNaam($naam)
    {
        if(!isset($_SESSION['naam']))
        {
            $_SESSION['naam'] = $naam;
            return true;
        }else if ($_SESSION['naam'] != $naam){
            unset($_SESSION['naam']);
            $_SESSION['number'] = 1;
            return false;
        }else{
            return true;
        }
    }

}

$session = new Session();
$message = $session->message();
?>