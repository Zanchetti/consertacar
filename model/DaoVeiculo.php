<?php

class DaoVeiculo {

    private $conexao;

    function __construct() {
        try {
            $this->conexao = new PDO("mysql:host=localhost;port=3306;dbname=consertacar", "root", "root");
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    function inserir(Veiculo $veiculo) {
        try {
            return $this->conexao->exec("insert into veiculos (modelo, placa, ano, id_cliente, id_marca) values ('" . $veiculo->getModelo() . "', '" . $veiculo->getPlaca() . "', " . $veiculo->getAno() . ", " . $veiculo->getId_cliente() . ", " . $veiculo->getId_fabricante() . ")");
        } catch (PDOException $ex) {
            return false;
        }
    }

    function editar(Veiculo $veiculo) {
        try {
            return $this->conexao->exec("update veiculos set modelo='" . $veiculo->getModelo() . "', placa='" . $veiculo->getPlaca() . "', ano=" . $veiculo->getAno() . ", id_cliente=" . $veiculo->getId_cliente() . ", id_marca=" . $veiculo->getId_fabricante() . " where id=" . $veiculo->getId());
        } catch (PDOException $ex) {
            return false;
        }
    }

    function excluir($id) {
        try {
            return $this->conexao->exec("delete from veiculos where id=" . $id);
        } catch (PDOException $ex) {
            return false;
        }
    }

    function listar() {
        try {
            return $this->conexao->query("select v.*, c.nome as cliente, m.nome as marca FROM veiculos v join clientes c on v.id_cliente = c.id join marcas m on v.id_marca = m.id", PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            return false;
        }
    }

    function selecionar($id) {
        try {
            return $this->conexao->query("select * from veiculos where id = " . $id)->fetchObject();
        } catch (PDOException $ex) {
            return false;
        }
    }

}
