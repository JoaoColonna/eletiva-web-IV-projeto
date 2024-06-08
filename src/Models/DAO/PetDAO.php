<?php

namespace Php\Projetocomposer\Models\DAO;

use Php\Projetocomposer\Models\Domain\Pet;
use Php\Projetocomposer\Models\DAO\Conexao;
use Php\Projetocomposer\Models\DAO\ClienteDAO;

class PetDAO {

    private Conexao $conexao;
    private ClienteDAO $clienteDAO;

    public function __construct() {
        $this->conexao = new Conexao();
        $this->clienteDAO = new ClienteDAO();
    }

    public function inserir(Pet $pet) {
        try {
            $sql = "INSERT INTO pet (nome, raca, dono_id) VALUES (:nome, :raca, :donoid)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $pet->getNome());
            $p->bindValue(":raca", $pet->getRaca());
            $p->bindValue(":donoid", $pet->getDonoId());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function editar(Pet $pet) {
        try {
            $sql = "UPDATE pet SET nome = :nome, raca = :raca, dono_id = :dono_id WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $pet->getId());
            $p->bindValue(":nome", $pet->getNome());
            $p->bindValue(":raca", $pet->getRaca());
            $p->bindValue(":dono_id", $pet->getDonoId());
            return $p->execute();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function deletar($id){
        try {
            $sql = "DELETE FROM pet WHERE id = :id";
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
            $sql = "SELECT * FROM pet WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function getClientes() {
        return $this->clienteDAO->getClientes();
    }

    public function mostrarTodos() {
        try {
            $sql = "SELECT * FROM pet";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->execute();
            return $p->fetchAll();
        } catch (\Exception $th) {
            return 0;
        }
    }
}
