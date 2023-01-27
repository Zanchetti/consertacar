<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Cliente
 *
 * @author aluno
 */
class Cliente {

    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $data_nascimento;
    private $id;

    public function __construct($nome = null, $cpf = null, $email = null, $telefone = null, $data_nascimento = null, $id = null) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->data_nascimento = $data_nascimento;
        $this->id = $id;
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

    public function getCpf() {
        return $this->cpf;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    public function getData_nascimento() {
        return $this->data_nascimento;
    }

    public function setData_nascimento($data_nascimento): void {
        $this->data_nascimento = $data_nascimento;
    }

}
