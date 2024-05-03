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

    public function alterar(Categoria $categoria){
        try {
            $sql = "UPDATE categoria set descricao = :descricao where id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $categoria->getDescricao());
            $p->bindValue(":id", $categoria->getId());
            // print_r($p);die;
            return $p->execute();
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

    public function mostrar($id){
        try {
            $sql = "SELECT * FROM categoria WHERE id = :id ";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function apagar(){
        try {
            $sql = "DELETE FROM categoria WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $ex){
            return 0;
        }
    }

    

}