<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Marca
 *
 * @author aluno
 */
class Marca {

    private $id;
    private $nome;

    public function __construct($nome = null,$id = null) {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

}
