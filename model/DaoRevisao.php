<?php

class DaoRevisao {

    private $conexao;

    function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=localhost;port=3306;dbname=consertacar", "root", "root");
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    function inserir(Revisao $revisao) {
        try {
            return $this->conexao->exec("insert into revisoes (data, km, id_veiculo) values ('" . $revisao->getData() . "', " . $revisao->getKm() . ", " . $revisao->getId_veiculo() . ")");
        } catch (PDOException $ex) {
            return false;
        }
    }

    function editar(Revisao $revisao) {
        try {
            return $this->conexao->exec("update revisoes set data='" . $revisao->getData() . "', km=" . $revisao->getKm() . ", id_veiculo=" . $revisao->getId_veiculo() . " where id=" . $revisao->getId());
        } catch (PDOException $ex) {
            return false;
        }
    }

    function excluir($id) {
        try {
            return $this->conexao->exec("delete from revisoes where id=" . $id);
        } catch (PDOException $ex) {
            return false;
        }
    }

    function listar() {
        try {
            return $this->conexao->query("SELECT r.*, v.placa FROM revisoes r join veiculos v on v.id = r.id_veiculo;", PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            return false;
        }
    }

    function selecionar($id) {
        try {
            return $this->conexao->query("select * from revisoes where id = " . $id)->fetchObject();
        } catch (PDOException $ex) {
            return false;
        }
    }

    function testeData($id, $data) {
        try {
            return $this->conexao->query("SELECT timestampdiff(month, (select r.data from revisoes r where id_veiculo = " . $id . " order by id desc limit 1), '" . $data . "') as meses")->fetchColumn();
        } catch (PDOException $ex) {
            return false;
        }
    }

    function testeKm($id, $km) {
        try {
            return $this->conexao->query("SELECT $km-km from revisoes where id_veiculo = " . $id . " order by id desc limit 1")->fetchColumn();
        } catch (PDOException $ex) {
            return false;
        }
    }

}
