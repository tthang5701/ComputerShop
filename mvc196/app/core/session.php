<?php

class session{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {session_start();}
    }
    public static function has($name){
        if(isset($_SESSION[$name])){
            return true;
        }
        return false;
    }   
    public static function set($name,$value){
             $_SESSION[$name] = $value;
    }

    public static function remove($name){
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    }
    public static function get($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
        return false;
    }
    public static function destroySession(){
        session_destroy();
    }
    public static function checkLoginSession(){
        if(self::get('login')==false){
            self::destroySession();
            header("Location:".LOGIN_URL_DEFAULT);
        }
    }
}
?>