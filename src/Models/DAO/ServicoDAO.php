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
}