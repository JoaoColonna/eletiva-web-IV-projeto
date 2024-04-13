<?php

namespace Php\Projetocomposer\Models\Domain;

class Pet{

    private $id;
    private $nome;
    private $raca;
    private $dono_id;

    public function __construct($id, $nome, $raca, $dono_id){
        $this->setId($id);
        $this->setNome($nome);
        $this->setRaca($raca);
        $this->setDonoId($dono_id);
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

    public function getRaca(){
        return $this->raca;
    }

    public function setRaca($raca){
        $this->raca = $raca;
    }

    public function getDonoId(){
        return $this->dono_id;
    }
    public function setDonoId($dono_id){
        $this->dono_id = $dono_id;
    }
}
