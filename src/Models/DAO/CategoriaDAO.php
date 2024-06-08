<?php

namespace Php\Projetocomposer\Models\DAO;

use Php\Projetocomposer\Models\Domain\Categoria;

class CategoriaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Categoria $categoria){
        try{
            $sql = "INSERT INTO categoria (descricao) VALUES (:descricao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $categoria->getDescricao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar($categoria){
        try {
            $sql = "UPDATE categoria set (descricao = :descricao) where id = {$categoria->getId()}";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $categoria->getDescricao());
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function mostrarTodos(){
        try {
            $sql = "SELECT * FROM categoria";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->execute();
            return $p->fetchAll();
        } catch (\Exception $th) {
            return 0;
        }
    }

    

}