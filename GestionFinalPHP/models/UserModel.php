<?php
namespace ism\models;
use ism\lib\Session;
use ism\lib\AbstractModel;
class UserModel extends AbstractModel{

    public function __construct() {
        parent::__construct();
        $this->tableName = "utilisateur";
        $this->primaryKey = "id";
    }
    public function selectUserByLogin(string $login ,string $password):array{
        $sql= "SELECT * FROM $this->tableName 
        WHERE login=? and password=?";
        $result=$this->selectBy($sql,[$login , $password],true);
        return $result["count"]==0?[]:$result["data"];
    }
    
    public function loginExiste(string $login):bool{
        $sql= "SELECT * FROM $this->tableName WHERE login=:login";
        $result=$this->selectBy($sql,[':login'=>$login],true);
        return $result["count"]==0?false:true;
    }

    public function insert(array $user):bool{
        extract($user);
        $sql= "INSERT INTO $this->tableName 
        (login,password,nom,role,avatar)
        VALUES 
        (?,?,?,?,?)";
        $result=$this->persit($sql,[$login,$password,$nom, $role,$avatar]);
        return $result["count"]==0?false:true;
    }
    public function update(array $data):bool{
        extract($data);
        $sql = "UPDATE $this->tableName SET login=? , password=?, avatar = ? WHERE login=? ;";
        $result = $this->persit($sql,[$login , $password , $photo ,Session::getSession("user_connect")["login"]]);
        return  $result["count"]==0?true:false;
    }
    public function delete(array $data):bool{
        extract($data);
        $sql= "DELETE FROM $this->tableName WHERE login= ?";
        $result = $this->persit($sql, [$login]);
        return $result["count"]==0?true:false;

    }
}

