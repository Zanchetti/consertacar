<?php

class DaoAdministrador {

    private $conexao;

    function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=localhost;port=3306;dbname=consertacar", "root", "root");
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    function inserir(Administador $administrador) {
        try {
            return $this->conexao->exec("insert into administradores (nome, email, senha, tentativas) values ('" . $administrador->getNome() . "', '" . $administrador->getEmail() . "', '" . $administrador->getSenha() . "', 0)");
        } catch (PDOException $ex) {
            return false;
        }
    }

    function editar(Administador $administrador) {
        try {
            if($administrador->getSenha()){
                return $this->conexao->exec("update administradores set nome='" . $administrador->getNome() . "', email='" . $administrador->getEmail() . "', senha='" . $administrador->getSenha() . "' where id=" . $administrador->getId());
            }else{
                return $this->conexao->exec("update administradores set nome='" . $administrador->getNome() . "', email='" . $administrador->getEmail() . "' where id=" . $administrador->getId());
            }
            
        } catch (PDOException $ex) {
            return false;
        }
    }

    function excluir($id) {
        try {
            return $this->conexao->exec("delete from administradores where id=" . $id);
        } catch (PDOException $ex) {
            return false;
        }
    }

    function listar() {
        try {
            return $this->conexao->query("select * from administradores", PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            return false;
        }
    }
    
    function selecionar($id){
        try{
            return $this->conexao->query("select * from administradores where id = ".$id)->fetchObject();
        } catch (PDOException $ex) {
            return false;
        } 
    }

}
