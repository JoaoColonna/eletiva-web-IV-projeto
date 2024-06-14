<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\ClienteDAO;
use Php\Projetocomposer\Models\Domain\Cliente;

class ClienteController{

    public function inserir($params){
        require_once("../src/Views/cliente/inserir_cliente.php");
    }

    public function novo($params){
        $cliente = new Cliente(0, $_POST['nome'], $_POST['telefone']);
        $clienteDAO = new ClienteDAO();
        if ($clienteDAO->inserir($cliente)){
            header("location: /cliente/inserir/true");
        } else{
            header("location: /cliente/inserir/false");
        }
    }

    public function update($params){
        $clienteDAO = new ClienteDAO();
        $cliente = $clienteDAO->getById($params[1]);
        require_once("../src/Views/cliente/editar_cliente.php");
    }

    public function editar(){ // passado via post
        $clienteDAO = new ClienteDAO();
        $cliente = new Cliente($_POST['id'], $_POST['nome'], $_POST['telefone']);
        if($clienteDAO->editar($cliente)){
            header("location: /cliente/alterar/true");
        } else{
            header("location: /cliente/alterar/false");
        }
    }

    public function excluir($params){
        $clienteDAO = new ClienteDAO();
        $cliente = $clienteDAO->getById($params[1]);
        require_once("../src/Views/cliente/deletar_cliente.php");
    }

    public function deletar(){
       $clienteDAO = new ClienteDAO();
        $cliente = $clienteDAO->deletar($_POST['id']);
        if($cliente){
            header("location: /cliente/excluir/true");
        } else{
            header("location: /cliente/excluir/false");
        }
    }

    public function index($params){
        $clienteDAO = new ClienteDAO;
        $clientes = $clienteDAO->mostrarTodos();
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
        require_once("../src/Views/cliente/cliente.php");
    }
}