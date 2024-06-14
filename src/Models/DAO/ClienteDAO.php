<?php

namespace Php\Projetocomposer\Models\DAO;

use Php\Projetocomposer\Models\Domain\Cliente;

class ClienteDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Cliente $cliente){
        try{
            $sql = "INSERT INTO cliente (nome, telefone) VALUES (:nome, :telefone)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $cliente->getNome());
            $p->bindValue(":telefone", $cliente->getTelefone());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function editar(Cliente $cliente) {
        try {
            $sql = "UPDATE cliente SET nome = :nome, telefone = :telefone WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $cliente->getId());
            $p->bindValue(":nome", $cliente->getNome());
            $p->bindValue(":telefone", $cliente->getTelefone());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function deletar($id){
        try {
            $sql = "DELETE FROM cliente WHERE id = :id";
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
            $sql = "SELECT * FROM cliente WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function getClientes() {
        $sql = "SELECT id, nome FROM cliente";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public function mostrarTodos() {
        try {
            $sql = "SELECT * FROM cliente";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->execute();
            return $p->fetchAll();
        } catch (\Exception $th) {
            return 0;
        }
    }

}