<?php
namespace Admin\Libs;
use PDO;

class Category extends Database{
    protected static $db_table="categories";
    protected static $db_fields=array("name","description");

    protected $id;
    protected $name;
    protected $description;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

    public function setName($name){
        $this->name=$name;
    }
    public function getName(){
        return $this->name;
    }

    public function setDescription($description){
        $this->description=$description;
    }
    public function getDescription(){
        return $this->description;
    }

    
    
}
