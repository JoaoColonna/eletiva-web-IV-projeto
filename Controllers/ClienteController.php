<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\ModelsDAO\ClienteDAO;
use Php\Projetocomposer\Models\Domain\Cliente;

class ClienteController{

    public function inserir($params){
        require_once("../src/Views/cliente/inserir_cliente.php");
    }

    public function novo($params){
        $cliente = new Cliente(0, $_POST['nome'], $_POST['telefone']);
        $clienteDAO = new ClienteDAO();
        if ($clienteDAO->inserir($cliente)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}