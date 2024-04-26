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
           header(" location: /categoria.php?inserir=true;");
        } else {
            header(" location: /categoria.php?inserir=false;");
        }
    }

    public function index($params){
        $categoria = new CategoriaDAO();
        $categorias = $categoria->mostrarTodos();
        if(isset($_GET['inserir'])){
            $inserir = $_GEt['inserir'];
            if($inserir){
                $inserir_sucesso="";
                $inserir_erro="hidden";
            } else if (!$inserir){
                $inserir_erro="";
                $inserir_sucesso="hidden";
            }
        }
        require_once("../src/Views/categoria/categoria.php");
    }

}