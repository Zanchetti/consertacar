<?php

class ControlVeiculo {

    private $veiculo;
    private $daoVeiculo;
    private $erros;

    public function __construct() {
        $this->veiculo = new Veiculo();
        $this->daoVeiculo = new DaoVeiculo();
        $this->erros = array();
    }

    public function inserir($modelo, $placa, $ano, $id_cliente, $id_marca) {
        if (strlen($modelo) == 0) {
            $this->erros[] = "Informe o modelo do carro: ";
        }
        if (strlen($placa) == 0) {
            $this->erros[] = "Informe a placa do carro: ";
        }
        if (strlen($ano) == 0) {
            $this->erros[] = "Informe o ano do carro: ";
        }
        if (strlen($id_cliente) == 0) {
            $this->erros[] = "Informe o cliente: ";
        }
        if (strlen($id_marca) == 0) {
            $this->erros[] = "Informe a marca do carro: ";
        }

        if (!$this->erros) {
            $this->veiculo = new Veiculo($modelo, $placa, $ano, $id_cliente, $id_marca);
            if ($this->daoVeiculo->inserir($this->veiculo)) {
                return true;
            } else {
                $this->erros[] = "Erro ao inserir o registro";
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar($modelo, $placa, $ano, $id_cliente, $id_marca, $id) {
        if (strlen($placa) == 0) {
            $this->erros[] = "Informe a placa do carro: ";
        }

        if (!$this->erros) {
            $this->veiculo = new Veiculo($modelo, $placa, $ano, $id_cliente, $id_marca, $id);
            if ($this->daoVeiculo->editar($this->veiculo)) {
                return true;
            } else {
                $this->erros[] = "Erro ao editar o registro";
                return false;
            }
        } else {
            return false;
        }
    }

    public function excluir($id) {
        if ($this->daoVeiculo->excluir($id)) {
            return true;
        } else {
            $this->erros[] = "Erro eo excluir o registro";
            return false;
        }
    }

    public function listar() {
        return $this->daoVeiculo->listar();
    }

    public function selecionar($id) {
        return $this->daoVeiculo->selecionar($id);
    }

    function getErros() {
        return $this->erros;
    }

}
