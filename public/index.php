<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Controller;
use App\Working;
use App\Model;
use App\WorkingRep;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$url = 'http://dreamary.ml:666';
$uri = $_SERVER['REQUEST_URI'];

$loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
$twig = new Environment($loader);


$control = new Controller($twig);
$reposy = new WorkingRep();
$control -> dop_form();
$control->Show($reposy->RepGetAll());
$control -> dop_form2();

$id = $_GET['id'];
$name = $_GET['name'];
$tale = $_GET['tale'];
$price = $_GET['price'];
$action = $_GET['add'];

//защита от п***их людей
settype($name, "string");$mystring = $name;$findme   = '<'; $pos1 = strpos($mystring, $findme); 
settype($tale, "string"); $mystring = $tale; $findme   = '<'; $pos2 = strpos($mystring, $findme); 
settype($price, "string"); $mystring = $price; $findme   = '<'; $pos3 = strpos($mystring, $findme);  
settype($action, "string"); $mystring = $action; $findme   = '<'; $pos4 = strpos($mystring, $findme);     

//Поиск по айди
$Id = $_POST['id'];
if ($Id != '') {
    $control->Poisk($reposy->RepPoiskId($Id));
}
//Поиск по значению поля цена
$Pr = $_POST['price'];
if ($Pr != '') {
    $control->Poisk($reposy->RepPoiskPrice($Pr));
}

//Удаление и добавление записи
if ($id != '' && $name != '' && $tale != '' && $price != '' 
&& $pos1===false && $pos2===false && $pos3===false && $pos4===false)
{
 if (isset($_GET['add'])){
    $reposy->RepAdd($id,$name,$tale,$price);
    }
 if (isset($_GET['delete'])){
    $reposy->RepDelete($id);
  }  
    header('Refresh: 0; url=index.php'); 
}
