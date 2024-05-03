<?php

namespace Php\Projetocomposer\Controllers;

use Php\Projetocomposer\Models\DAO\CategoriaDAO;
use Php\Projetocomposer\Models\Domain\Categoria;

class CategoriaController{

    public function inserir($params){
        require_once("../src/Views/categoria/inserir_categoria.html");
    }

    public function alterar($params){
        $categoriaDAO = new CategoriaDAO();
        $cat = $categoriaDAO->mostrar($params[1]);
        require_once("../src/Views/categoria/alterar_categoria.php");
    }

    public function excluir($params){

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

    public function editar($params){
        $categoria = new Categoria($_POST['id'], $_POST['descricao']);
        $categoriaDAO = new CategoriaDAO;
        if($categoriaDAO->alterar($categoria)){
            header("location: /categoria/alterar/true");
        } else {
            header("location: /categoria/alterar/false");
        }
    }
    public function index($params){
        $categoria = new CategoriaDAO();
        $categorias = $categoria->mostrarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        $mensagem = "";
        switch ($acao) {
            case 'inserir':
                $acaoMsg = 'inserido';
                break;
            case 'alterar':
                $acaoMsg = 'alterado';
                break;
        }

        if($status == "true"){
            $mensagem = "Registro $acaoMsg com sucesso!";
            $status = "success";
        } else if ($status == "false"){
            $mensagem = "Erro ao $acao registro.";
            $status = "danger";
        }
        require_once("../src/Views/categoria/categoria.php");
    }

}