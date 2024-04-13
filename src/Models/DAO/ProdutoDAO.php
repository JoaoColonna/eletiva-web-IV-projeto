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
}