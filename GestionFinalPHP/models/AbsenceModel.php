<?php
namespace ism\models;
use ism\lib\AbstractModel;
class AbsenceModel extends AbstractModel{

    public function __construct() {
        parent::__construct();
        $this->tableName = "absence";
        $this->primaryKey = "idAbsence";
    }

    public function selectByMatriculeEtu(string $matriculeEtu):array{
        $sql = "SELECT * FROM $this->tableName , cours
        WHERE coursId =idCours and  etudiantMatricule=?";
        $result = $this->selectBy($sql, [$matriculeEtu]);
        return $result["count"] == 0 ? [] : $result["data"];
    }
    public function selectByCoursId(string $coursId , string $matriculeEtu):array{
        $sql = "SELECT * FROM $this->tableName
        WHERE CoursId=? and etudiantMatricule =?";
        $result = $this->selectBy($sql, [$coursId , $matriculeEtu]);
        return $result["count"] == 0 ? [] : $result["data"];
    }
    public function selectByCours(string $coursId):array{
        $sql = "SELECT * FROM $this->tableName,cours
        WHERE CoursId=idCours and CoursId=?";
        $result = $this->selectBy($sql, [$coursId]);
        return $result["count"] == 0 ? [] : $result["data"];
    }

    public function insert(array $absence){
        extract($absence);
        $sql = "INSERT INTO $this->tableName
        (dateAbsence,etudiantMatricule,coursId)
        VALUES 
        (?,?,?)";
        $result = $this->persit($sql, [$dateAbsence, $etudiantMatricule, $coursId]);
        return $result["count"] == 0 ? false : true;
    }

    public function selectAbsenceBySemestre( string $semestreCours , string $matriculeEtu): array
    {
        $sql = "SELECT * FROM cours , $this->tableName WHERE idCours = coursId and   semestreCours = ? and etudiantMatricule=? ";
        $result = $this->selectBy($sql, [ $semestreCours , $matriculeEtu]);
        return $result["count"] == 0 ? [] : $result["data"];
    }
    
}