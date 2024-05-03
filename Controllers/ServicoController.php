<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\ServicoDAO;
use Php\Projetocomposer\Models\Domain\Servico;

class ServicoController{

    public function inserir($params){
        require_once("../src/Views/servico/inserir_servico.php");
    }

    public function novo($params){
        $pet = new Servico(0, $_POST['nome'], $_POST['descricao'], $_POST['valor']);
        $servicoDAO = new ServicoDAO();
        if ($servicoDAO->inserir($pet)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}