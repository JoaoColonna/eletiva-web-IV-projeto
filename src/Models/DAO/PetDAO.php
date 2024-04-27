<?php

namespace Php\Projetocomposer\Models\DAO;

use Php\Projetocomposer\Models\Domain\Pet;

class PetDAO{

    private Conexao $conexao;
    private ClienteDAO $clienteDAO;

    public function __construct(){
        $this->conexao = new Conexao();
        $this->clienteDAO = new ClienteDAO();
    }

    public function inserir(Pet $pet){
        try{
            $sql = "INSERT INTO pet (nome, raca, dono_id) VALUES (:nome, :raca, :donoid)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $pet->getNome());
            $p->bindValue(":raca", $pet->getRaca());
            $p->bindValue(":donoid", $pet->getDonoId());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function getClientes() {
        return $this->clienteDAO->GetClientes();
    }

}