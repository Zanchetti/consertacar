<?php

class DaoMarca {

    private $conexao;

    public function __construct() {
        $this->conexao = new PDO("mysql:host=localhost;port=3306;dbname=consertacar", "root", "root");
    }

    function inserir(Marca $marca) {
        try {
            return $this->conexao->exec("insert into marcas (nome) values ('" . $marca->getNome() . "')");
        } catch (PDOException $ex) {
            return false;
        }
    }

    function editar(Marca $marca) {
        try {
            return $this->conexao->exec("update marcas set nome='" . $marca->getNome() . "' where id=" . $marca->getId());
        } catch (PDOException $ex) {
            return false;
        }
    }

    function excluir($id) {
        try {
            return $this->conexao->exec("delete from marcas where id=" . $id);
        } catch (PDOException $ex) {
            return false;
        }
    }

    function listar() {
        try {
            return $this->conexao->query("select * from marcas", PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            return false;
        }
    }

    function selecionar($id) {
        try {
            return $this->conexao->query("select * from marcas where id = " . $id)->fetchObject();
        } catch (PDOException $ex) {
            return false;
        }
    }

}
