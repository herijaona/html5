<?php
Class Session{
    private static $session_start = false;
    public static function start(){
        // if(empty($_SESSION))
        if(self::$session_start == true){
            session_start();
            self::$session_start = false;
        }                
    }
    public static function set($key,$value){
        $_SESSION['$key'] = $value;
    }
    public static function get($key){
        
            if(isset($_SESSION['$key']))
            return $_SESSION['$key'];
            else
            return false;
    }
    public static function destroys(){
        if(self::$session_start == true){
            session_unset();
            session_destroy();
        }
    }
}