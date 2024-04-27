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

    public function getClientes() {
        $sql = "SELECT id, nome FROM cliente";
        $p = $this->conexao->getConexao()->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

}