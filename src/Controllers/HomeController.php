<?php

namespace Php\Projetocomposer\Controllers;

class HomeController 
{
    
    public function olaMundo($params){
        return "Olá Mundo!";
    }

    public function formExer1($params){
        require_once("../src/Views/exer1.html");
    }

    public function formExer4($params){
        require_once("../src/Views/exer4.php");
    }
}
 