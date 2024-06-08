<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\PetDAO;
use Php\Projetocomposer\Models\DAO\Conexao;
use Php\Projetocomposer\Models\Domain\Pet;

class PetController{

    private Conexao $conexao;
    
    public function index($params){
        $pet = new PetDAO();
        $pets = $pet->mostrarTodos();
        $clientes = $pet->getClientes();
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
        require_once("../src/Views/pet/pet.php");
    }

    public function inserir($params){
        $petDAO = new PetDAO();
        $clientes = $petDAO->getClientes();
        require_once("../src/Views/pet/inserir_pet.php");
    }

    public function novo($params){
        $pet = new Pet(0, $_POST['nome'], $_POST['raca'], $_POST['dono_id']);
        $petDAO = new PetDAO();
        if ($petDAO->inserir($pet)){
            header("location: /pet/inserir/true");
        } else{
            header("location: /pet/inserir/false");
        }
    }

    public function update($params){
        $petDAO = new PetDAO();
        $pet = $petDAO->getById($params[1]);
        $clientes = $petDAO->getClientes();
        require_once("../src/Views/pet/editar_pet.php");
    }

    public function editar(){ // passado via post
        $petDAO = new PetDAO();
        $pet = new Pet($_POST['id'], $_POST['nome'], $_POST['raca'], $_POST['dono_id']);
        if($petDAO->editar($pet)){
            header("location: /pet/alterar/true");
        } else{
            header("location: /pet/alterar/false");
        }
    }

    public function excluir($params){
        $petDAO = new PetDAO();
        $pet = $petDAO->getById($params[1]);
        $clientes = $petDAO->getClientes();
        require_once("../src/Views/pet/deletar_pet.php");
    }

    public function deletar(){
        $petDAO = new PetDAO();
        $pet = $petDAO->deletar($_POST['id']);
        if($pet){
            header("location: /pet/excluir/true");
        } else{
            header("location: /pet/excluir/false");
        }
    }
}