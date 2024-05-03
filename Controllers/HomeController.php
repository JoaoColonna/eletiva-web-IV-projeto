<?php

namespace Php\Projetocomposer\Controllers;

class HomeController 
{
    
    public function olaMundo($params){
        return "Olá Mundo!";
    }

    public function formExer1($params){
        require_once("../src/Views/lista2/exer1.html");
    }

    public function formExer2($params){
        require_once("../src/Views/lista2/exer2.html");
    }

    public function formExer3($params){
        require_once("../src/Views/lista2/exer3.html");
    }

    public function formExer4($params){
        require_once("../src/Views/lista2/exer4.php");
    }

    public function formExer5($params){
        require_once("../src/Views/lista2/exer5.html");
    }

    public function formExer6($params){
        require_once("../src/Views/lista2/exer6.html");
    }

    public function formExer7($params){
        require_once("../src/Views/lista2/exer7.html");
    }

    public function formExer8($params){
        require_once("../src/Views/lista2/exer8.html");
    }

    public function formExer9($params){
        require_once("../src/Views/lista2/exer9.html");
    }

    public function formExer10($params){
        require_once("../src/Views/lista2/exer10.html");
    }
}
 