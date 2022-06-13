<?php
namespace App;
use Twig\Environment;

class Controller
{
    private  $twig;

     public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function Show($info)
    {
        echo $this->twig->render('main.html.twig',['info' => $info]);
    }
    
    public function Poisk($info)
    {
       
        echo $this->twig->render('poisk.html.twig',['info' => $info]);
    }
    
     public function dop_form()
    {
        echo $this->twig->render('changes.html.twig');
    }
    
     public function dop_form2()
    {
        echo $this->twig->render('search.html.twig');
    }
    
}