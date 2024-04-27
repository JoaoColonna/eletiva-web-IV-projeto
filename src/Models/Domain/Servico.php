<?php

namespace Php\Projetocomposer\Models\Domain;

class Servico{

    private $id;
    private $nome;
    private $descricao;
    private $valor;

    public function __construct($id, $nome, $descricao, $valor){
        $this->setId($id);
        $this->setNome($nome);
        $this->setDescricao($descricao);
        $this->setValor($valor);
    }

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }
}