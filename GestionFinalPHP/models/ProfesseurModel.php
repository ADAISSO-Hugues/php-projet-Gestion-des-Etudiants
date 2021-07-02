<?php


namespace ism\models;


use ism\lib\AbstractModel;

class ProfesseurModel extends AbstractModel
{
    public function __construct() {
        parent::__construct();
        $this->tableName = "utilisateur";
        $this->primaryKey = "matriculeProf";
    }
    public function selectEtByMat(string $Mat):array{
        $sql= "SELECT * FROM $this->tableName 
        WHERE matriculeProf=?";
        $result=$this->selectBy($sql,[$matriculeProf],true);
        return $result["count"]==0?[]:$result["data"];
    }

    public function MatExiste(string $login):bool{
        $sql= "SELECT * FROM $this->tableName WHERE matriculeProf=:maticuleProf";
        $result=$this->selectBy($sql,[':matriculeProf'=>$matriculeProf],true);
        return $result["count"]==0?false:true;
    }
    public function insert(array $user){
        extract($user);
        $sql = "INSERT INTO $this->tableName 
        (matriculeProf,nomProf,prenomProf,dateNaissanceProf,sexeProf,gradeProf,classeProf,
        moduleProf , avatarProf , login , password, role)
        VALUES 
        (?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->persit($sql, [$matriculeProf, $nomProf, $prenomProf, $dateNaissanceProf, $sexeProf, $gradeProf, $classeProf, $moduleProf,$avatarProf , $login, $password,$role]);
        return $result["count"] == 0 ? false : true;
    }
    public function update(array $data){
        extract($data);
        $sql = "UPDATE $this->tableName SET login=? , password=? , avatar =?) WHERE matriculeProf=? ;";
        $result = $this->persit($sql,[ $login,$password, $avatarProf]);
        return ;
    }
}