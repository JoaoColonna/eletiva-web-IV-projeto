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
            $sql = "INSERT INTO cliente (nome, telefone) VALUES (:descricao)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $cliente->getDescricao());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

}