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
            header("location: /servico/inserir/true");
        } else{
            header("location: /servico/inserir/false");
        }
    }

    public function update($params){
        $servicoDAO = new servicoDAO();
        $servico = $servicoDAO->getById($params[1]);
        require_once("../src/Views/servico/editar_servico.php");
    }

    public function editar(){ // passado via post
        $servicoDAO = new servicoDAO();
        $servico = new Servico($_POST['id'], $_POST['nome'], $_POST['descricao'], $_POST['valor']);
        if($servicoDAO->editar($servico)){
            header("location: /servico/alterar/true");
        } else{
            header("location: /servico/alterar/false");
        }
    }

    public function excluir($params){
        $servicoDAO = new servicoDAO();
        $servico = $servicoDAO->getById($params[1]);
        require_once("../src/Views/servico/deletar_servico.php");
    }

    public function deletar(){
       $servicoDAO = new servicoDAO();
        $servico = $servicoDAO->deletar($_POST['id']);
        if($servico){
            header("location: /servico/excluir/true");
        } else{
            header("location: /servico/excluir/false");
        }
    }

    public function index($params){
        $servicoDAO = new servicoDAO;
        $servicos = $servicoDAO->mostrarTodos();
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
        require_once("../src/Views/servico/servico.php");
    }
}