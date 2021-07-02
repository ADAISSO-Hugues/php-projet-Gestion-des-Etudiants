<?php
namespace ism\lib;

class PasswordEncoder {

    public static function encode(string $password,  $algo = PASSWORD_DEFAULT){
        return password_hash ($password, $algo);
    }

    public static function decode(string $password, string $hash):bool{
       return password_verify($password , $hash);
    }
}