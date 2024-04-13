<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\PetDAO;
use Php\Projetocomposer\Models\Domain\Pet;

class PetController{

    public function inserir($params){
        $petDAO = new PetDAO();
        $clientes = $petDAO->getClientes();
        require_once("../src/Views/pet/inserir_pet.php");
    }

    public function novo($params){
        $pet = new Pet(0, $_POST['nome'], $_POST['raca'], $_POST['dono_id']);
        $petDAO = new PetDAO();
        if ($petDAO->inserir($pet)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}