<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\ProdutoDAO;
use Php\Projetocomposer\Models\Domain\Produto;

class ProdutoController{

    public function inserir($params){
        require_once("../src/Views/produto/inserir_produto.php");
    }

    public function novo($params){
        $pet = new Produto(0, $_POST['nome'], $_POST['descricao'], $_POST['valor']);
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->inserir($pet)){
            return "Inserido com sucesso!";
        } else {
            return "Erro ao inserir!";
        }
    }

}