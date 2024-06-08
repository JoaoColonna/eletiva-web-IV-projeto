<?php

namespace Php\Projetocomposer\Models\DAO;

use Php\Projetocomposer\Models\Domain\Produto;

class ProdutoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Produto $produto){
        try{
            $sql = "INSERT INTO produto (nome, descricao, valor) VALUES (:nome, :descricao, :valor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $produto->getNome());
            $p->bindValue(":descricao", $produto->getDescricao());
            $p->bindValue(":valor", $produto->getValor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function editar(Produto $produto) {
        try {
            $sql = "UPDATE produto SET nome = :nome, descricao = :descricao, valor = :valor WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $produto->getId());
            $p->bindValue(":nome", $produto->getNome());
            $p->bindValue(":descricao", $produto->getDescricao());
            $p->bindValue(":valor", $produto->getValor());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function deletar($id){
        try {
            $sql = "DELETE FROM produto WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }


    public function getById($id) {
        try {
            $sql = "SELECT * FROM produto WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function mostrarTodos() {
        try {
            $sql = "SELECT * FROM produto";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->execute();
            return $p->fetchAll();
        } catch (\Exception $th) {
            return 0;
        }
    }
}