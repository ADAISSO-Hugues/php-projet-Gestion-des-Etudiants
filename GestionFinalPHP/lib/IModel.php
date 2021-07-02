<?php
namespace ism\lib;
interface IModel{

    public function selectAll():array;
    public function selectById(int $id):array;
    public function selectBy(string $sql ,array $data=[],bool $single=false):array;
    public function insert(array $data);
    public function persit(string $sql,array $data):int;
    public function remove(int $id):int;
    public function update(array $data);
}

?>