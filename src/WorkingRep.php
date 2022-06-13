<?php
namespace App;
use PDO;
use App\Working;

class WorkingRep 
{    
    private $Allmod = array();
    private $mapper;

    public function __construct()
    {
        $this->mapper = new Working();
        $this->Allmod = $this->mapper->show();
    }
    
    
     public function RepGetAll()
    {
        return $this->Allmod;
    }

    public function RepAdd($id,$name,$tale,$price)
    {
        $this->mapper->save($id,$name,$tale,$price);
        $this->Allmod = $this->mapper->show();
    }


    public function RepDelete($DelId)
    {
        foreach ($this->Allmod as $mod)
        {
            if ($mod->getId() == $DelId)
            {
                $this->mapper->del($DelId);
            }
        }
            $this->Allmod = $this->mapper->show();

    }
    
    

    public function RepPoiskId($ID)
    {
       return $this->mapper->poisk($ID);
       $this->Allmod = $this->mapper->show();

 
    }


    public function RepPoiskPrice($value)
    {
        return $this->mapper->poiskPrice($value);
        
    }
    
    
}   