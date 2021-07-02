<?php
namespace ism\lib;

class Session{

    public static function setSession(string $key, $value):void{
        $_SESSION[$key]= $value;
    }
    
    public static function getSession(string $key){
        return $_SESSION[$key];
    }
    public static function openSession(){
        if(session_status()==PHP_SESSION_NONE){
            //session n'existe pas 
            session_start();
        }
    }
    public static function destroySession(){
        unset($_SESSION["user_connect"]);
        unset($_SESSION["users"]);
        unset($_SESSION["data"]);
        session_destroy();
    }
   public static function keyExist(string $key){

    return isset($_SESSION[$key]);
   }
   public static function destroyKey(string $key){
     unset($_SESSION[$key]);
   }
}