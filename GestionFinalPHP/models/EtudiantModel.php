<?php


namespace ism\models;


use Cassandra\Date;
use ism\lib\AbstractModel;

class EtudiantModel extends AbstractModel
{
    public function __construct() {
        parent::__construct();
        $this->tableName = "utilisateur";
        $this->primaryKey = "matriculeEtu";
    }
    public function selectEtByClasse(string $classe):array{
        $sql= "SELECT * FROM $this->tableName 
        WHERE classeEtu=?";
        $result=$this->selectBy($sql,[$classe]);
        return $result["count"]==0?[]:$result["data"];
    }

    public function selectEtByAnnee(string $annee):array{
        $sql= "SELECT * FROM $this->tableName 
        WHERE anneeScolaire=?";
        $result=$this->selectBy($sql,[$annee]);
        return $result["count"]==0?[]:$result["data"];
    }
    public function selectAnnee():array{
        $sql= "SELECT anneScolaire FROM $this->tableName";
        return $this->selectBy($sql);

    }
    public function MatExiste(string $login):bool{
        $sql= "SELECT * FROM $this->tableName WHERE matriculeEtu=:maticuleEtu";
        $result=$this->selectBy($sql,[':matriculeEtu'=>$matriculeEtu],true);
        return $result["count"]==0?false:true;
    }
    public function insert(array $user):bool{
        extract($user);
        $sql = "INSERT INTO $this->tableName 
        (matriculeEtu,nomEtu,prenomEtu,dateNaissanceEtu,sexeEtu,classeEtu,competenceEtu
        parcoursEtu , avatarEtu , anneeScolaire , login , password , role)
        VALUES 
        (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->persit($sql, [$matriculeEtu, $nomEtu, $prenomEtu, $dateNaissanceEtu, $sexeEtu, $classeProf,$competenceEtu, $parcoursEtu,$avatarEtu,$anneeScolaire ,$login ,$password,$role]);
        return $result["count"] == 0 ? false : true;
    }
    public function update(array $data):bool{
        extract($data);
        $sql = "UPDATE $this->tableName SET login=? , password =?, avatarEtu=?) WHERE matriculeEtu=? ;";
        $result = $this->persit($sql,[$login , $password, $avatarEtu]);
        return $result["count"]==0?true:false;
    }

}