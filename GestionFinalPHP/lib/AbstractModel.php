<?php 
namespace ism\lib;
use ism\lib\DataBase;
abstract class  AbstractModel implements IModel {

    protected string $tableName;
    protected string $primaryKey;
    private DataBase $dataBase; 

    public function __construct(){
        $this->dataBase= new DataBase();
    }
    
    public function selectAll():array{
        $sql="SELECT * FROM $this->tableName";
        return $this->dataBase->executeSelect($sql);   
    }

    public function selectById(int $id):array{
        $sql="SELECT * FROM $this->tableName  WHERE $this->primaryKey = ?";
        return $this->dataBase->executeSelect($sql, [$id], true); 
    }

    public function selectBy(string $sql ,array $data=[],bool $single=false):array{
        return $this->dataBase->executeSelect($sql, $data, $single);
    }

    public function insert(array $data){}

    public function persit(string $sql,array $data):int{
        $this->dataBase= new DataBase();
        return $this->dataBase->executeUpdate($sql, $data);
    }

    public function remove(int $id):int{
        return $this->dataBase->executeUpdate("DELETE  FROM $this->tableName WHERE $this->primaryKey = ?",[$id]);
    }
    
    public function update(array $data){
    }


    /**
     * Get the value of tableName
     */ 
    public function getTableName(){
        return $this->tableName;
    }

    /**
     * Set the value of tableName
     *
     * @return  self
     */ 
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * Get the value of primaryKey
     */ 
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * Set the value of primaryKey
     *
     * @return  self
     */ 
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;

        return $this;
    }
}


?>