<?php
namespace App;
use PDO;

class Model 
{
    private $id;
    private $name;
    private $tale;
    private $price;
    private $connection;

  public function __construct($id, $name, $tale, $price)
    {
        $this->id=$id;
        $this->name=$name;
        $this->tale=$tale;
        $this->price=$price;
    }

 public function test(){
     echo("Класс модель работает");
     
 }
    
    public function getID()         {return $this->id;}
    public function setID($id): void      {$this->id = $id;}
    public function getName()       {return $this->name;}
    public function setName($name): void  {$this->name = $name;}
    public function getTale()       {return $this->tale;}
    public function setTale($tale): void  {$this->tale = $tale;}
    public function getPrice()      {return $this->price;}
    public function setPrice($price): void  {$this->price = $price;}
}