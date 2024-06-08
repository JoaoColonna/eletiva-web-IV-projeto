<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\ProdutoDAO;
use Php\Projetocomposer\Models\Domain\Produto;

class ProdutoController{

    public function inserir($params){
        require_once("../src/Views/produto/inserir_produto.php");
    }

    public function novo($params){
        $produto = new Produto(0, $_POST['nome'], $_POST['descricao'], $_POST['valor']);
        $produtoDAO = new ProdutoDAO();
        if ($produtoDAO->inserir($produto)){
            header("location: /produto/inserir/true");
        } else{
            header("location: /produto/inserir/false");
        }
    }

    public function update($params){
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getById($params[1]);
        require_once("../src/Views/produto/editar_produto.php");
    }

    public function editar(){ // passado via post
        $produtoDAO = new ProdutoDAO();
        $produto = new Produto($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['valor']);
        if($produtoDAO->editar($produto)){
            header("location: /produto/alterar/true");
        } else{
            header("location: /produto/alterar/false");
        }
    }

    public function excluir($params){
        $produtoDAO = new ProdutoDAO();
        $produto = $produtoDAO->getById($params[1]);
        require_once("../src/Views/produto/deletar_produto.php");
    }

    public function deletar(){
       $produto = new ProdutoDAO();
        $produto =$produto->deletar($_POST['id']);
        if($produto){
            header("location: /produto/excluir/true");
        } else{
            header("location: /produto/excluir/false");
        }
    }

    public function index($params){
        $produtoDAO = new ProdutoDAO;
        $produtos = $produtoDAO->mostrarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true"){
            $color = "success";
            $mensagem = "Registro inserido com sucesso";
        } else if($acao == "inserir" && $status == "false"){
            $color = "danger";
            $mensagem = "Erro ao inserir";
        } else if($acao == "alterar" && $status == "true"){
            $color = "success";
            $mensagem = "Registro alterado com sucesso";
        } else if($acao == "alterar" && $status == "false"){
            $color = "danger";
            $mensagem = "Erro ao alterar";
        } else if($acao == "excluir" && $status == "true"){
            $color = "success";
            $mensagem = "Registro excluído com sucesso";
        } else if($acao == "excluir" && $status == "false"){
            $color = "danger";
            $mensagem = "Erro ao excluir";
        } else{
            $mensagem = "";
        }
        require_once("../src/Views/produto/produto.php");
    }

}