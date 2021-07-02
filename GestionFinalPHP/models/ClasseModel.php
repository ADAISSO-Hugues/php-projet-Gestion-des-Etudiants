<?php

namespace ism\models;


use Cassandra\Date;
use ism\lib\AbstractModel;

class ClasseModel extends AbstractModel
{
    public function __construct() {
        parent::__construct();
        $this->tableName = "classe";
        $this->primaryKey = "idClasse";
    }

    public function SelectByNivFil(string $niveauClass ,string $filiereClass){
         $sql= "SELECT * FROM $this->tableName
        WHERE niveauClass=? and filiereClass = ?";
        $result=$this->selectBy($sql,[$niveauClass , $filiereClass],true);
        return $result["count"]==0?[]:$result["data"];
    }
    public function SelectByNiv(string $niveauClass):array{
        $sql = "SELECT * FROM $this->tableName
        WHERE niveauClass=?";
        $result = $this->selectBy($sql, [$niveauClass], true);
        return $result["count"] == 0 ? [] : $result["data"];
    }
    public function insert(array $user):bool
    {
        extract($user);
        $sql = "INSERT INTO $this->tableName 
        (libelleClass, niveauClass, filiereClass)
        VALUES 
        (?,?,?)";
        $result = $this->persit($sql, [$libelleClass, $niveauClass, $filiereClass]);
        return $result["count"] == 0 ? false : true;
    }

}