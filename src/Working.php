<?php
namespace App;
use PDO;
use App\Model;

class Working 
{    
    private $connection;

    public function __construct(){
        $this->connection = new PDO
        ('mysql:host=localhost;dbname=testDB;charset=utf8', 'root', '00012278');
    }
    
    
    public function show(){
        $sql = 'SELECT * from coffee';
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $mod = [];
        foreach ($results as $result) {
            array_push($mod, new Model($result['id'], $result['name'], $result['tale'], $result['price']));
        }
        return $mod;
    }


    public function save($id,$name,$tale,$price){
        $data = array( 'id'=>$id, 'name' => $name, 'tale'=>$tale,
        'price'=>$price); 
        $query = $this->connection->prepare("insert into coffee (id, name, tale, price) 
        values (:id, :name, :tale, :price)");
        $query->execute($data);
    }


    
    public function del($delID)
    {
        $sql = "DELETE FROM coffee WHERE id=$delID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

    }
    
    public function poisk($ID){
        $sql = "SELECT * FROM coffee WHERE id=$ID";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $this->connection->query($sql);
        $test = $stmt->fetch();
        if ($test)
        {return $result;}
        
        else{echo ("<b>Кофе не найден, проверьте правильность ID</b>");}
    }
    
    
        public function poiskPrice($price){
        $sql = "SELECT * FROM coffee WHERE price <= $price";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $this->connection->query($sql);
        $test = $stmt->fetch();
        if ($test)
        {return $result;}
        
        else{echo ("<b>Поищи на Azon, там может быть дешевле</b>");}
    } 
    
}