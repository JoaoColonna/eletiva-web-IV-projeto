<?php

class Cliente{

    private $id;
    private $nome;
    private $telefone;

    public function __construct($id, $nome, $telefone){
        $this->setId($id);
        $this->setNome($nome);
        $this->setTelefone($telefone);
    }

    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getNome($nome){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefone($telefone){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
}
