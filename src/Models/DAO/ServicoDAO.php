<?php

namespace Php\Projetocomposer\Models\DAO;

use Php\Projetocomposer\Models\Domain\Servico;

class ServicoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Servico $servico){
        try{
            $sql = "INSERT INTO servico (nome, descricao, valor) VALUES (:nome, :descricao, :valor)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $servico->getNome());
            $p->bindValue(":descricao", $servico->getDescricao());
            $p->bindValue(":valor", $servico->getValor());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function editar(Servico $servico) {
        try {
            $sql = "UPDATE servico SET nome = :nome, descricao = :descricao, valor = :valor WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $servico->getId());
            $p->bindValue(":nome", $servico->getNome());
            $p->bindValue(":valor", $servico->getValor());
            $p->bindValue(":descricao", $servico->getDescricao());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function deletar($id){
        try {
            $sql = "DELETE FROM servico WHERE id = :id";
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
            $sql = "SELECT * FROM servico WHERE id = :id";
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
            $sql = "SELECT * FROM servico";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->execute();
            return $p->fetchAll();
        } catch (\Exception $th) {
            return 0;
        }
    }
}