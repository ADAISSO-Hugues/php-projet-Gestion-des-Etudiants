<?php
namespace ism\lib;

class Role{
    public static function estConnect():bool{
        return isset($_SESSION["user_connect"]);
    }
    public static function estAdmin():bool{
        return self::estConnect() && $_SESSION["user_connect"]["role"] == "ROLE_ADMIN";
    }

    public static function estAC():bool{
        return self::estConnect() && $_SESSION["user_connect"]["role"] == "ROLE_AC";
    }

    public static function estRP(): bool
    {
        return self::estConnect() && $_SESSION["user_connect"]["role"] == "ROLE_RP";
    }
    public static function estET(): bool
    {
        return self::estConnect() && $_SESSION["user_connect"]["role"] == "ROLE_ET";
    }

    public static function estProf(): bool
    {
        return self::estConnect() && $_SESSION["user_connect"]["role"] == "ROLE_PROF";
    }
}