<?php
namespace ism\models;
use ism\lib\AbstractModel;

class CoursModel extends AbstractModel
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "cours";
        $this->primaryKey = "idCours";
    }
    public function  selectCoursByProf(string $professeurCours){
        $sql= "SELECT * FROM $this->tableName 
        WHERE professeurCours=?";
        $result=$this->selectBy($sql,[$professeurCours]);
        return $result["count"]==0?[]:$result["data"];
    }
    public function  selectCours(string $coursId){
        $sql= "SELECT * FROM $this->tableName 
        WHERE idCours=?";
        $result=$this->selectBy($sql,[$coursId],true);
        return $result["count"]==0?[]:$result["data"];
    }
    public function insert(array $user):bool{
        extract($user);
        $sql= "INSERT INTO $this->tableName 
        (dateCours,classeCours , professeurCours ,moduleCours, semestreCours , nbrHeureCours, heureDebutCours,heureFinCours)
        VALUES 
        (?,?,?,?,?,?,?,?)";
        $result=$this->persit($sql,[$dateCours,$classeCours,$professeurCours, $moduleCours,$semestreCours, $nbrHeureCours , $heureDebutCours, $heureFinCours]);
        return $result["count"]==0?false:true;
    }
    public function  selectCoursByCl(string $classeCours){
        $sql= "SELECT * FROM $this->tableName 
        WHERE classeCours=?";
        $result=$this->selectBy($sql,[$classeCours]);
        return $result["count"]==0?[]:$result["data"];
    }
 public function selectCoursByDate(string $datedeb , string $datefin , string $matriculeEtu){
     $sql= "SELECT * FROM $this->tableName , absence 
        WHERE idCours= coursId and  etudiantMatricule = ? dateCours between ? and ?";
     $result=$this->selectBy($sql,[$matriculeEtu,$datedeb, $datefin]);
     return $result["count"]==0?[]:$result["data"];
 }
}
?>