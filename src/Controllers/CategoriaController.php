<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\CategoriaDAO;
use Php\Projetocomposer\Models\Domain\Categoria;

class CategoriaController{

    public function inserir($params){
        require_once("../src/Views/categoria/inserir_categoria.html");
    }

    public function novo($params){
        $categoria = new Categoria(0, $_POST['descricao']);
        $categoriaDAO = new CategoriaDAO();
        if ($categoriaDAO->inserir($categoria)){
           header("location: /categoria/inserir/true");
        } else {
            header("location: /categoria/inserir/false");
        }
    }

    public function index($params){
        $categoria = new CategoriaDAO();
        $categorias = $categoria->mostrarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        $mensagem = "";
        if($acao === "inserir" && $status == "true"){
            $mensagem = "Registro inserido com sucesso!";
            $status = "success";
        } else if ($acao === "inserir" && $status == "false"){
            $mensagem = "Erro ao inserir registro.";
            $status = "danger";
        }
        require_once("../src/Views/categoria/categoria.php");
    }

}