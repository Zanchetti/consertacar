<?php

class ControlRevisoes {

    private $revisao;
    private $daoRevisao;
    private $erros;
    private $alerta;

    public function __construct() {
        $this->revisao = new Revisao();
        $this->daoRevisao = new DaoRevisao();
        $this->erros = array();
        $this->alerta = array();
    }

    public function inserir($data, $km, $id_veiculo) {
        if (strlen($data) == 0) {
            $this->erros[] = "Informe a data da revisão: ";
        }
        if (strlen($km) == 0) {
            $this->erros[] = "Informe os KM's rodados do veículo:  ";
        }
        if (strlen($id_veiculo) == 0) {
            $this->erros[] = "Informe o veículo: ";
        }

        if (!$this->erros) {
            $this->revisao = new Revisao($data, $km, $id_veiculo);
            if ($this->TesteMeses()) {
                $this->alerta[] = "Meses Atrasados";
            }
            if ($this->TesteKm()) {
                $this->alerta[] = "Km Atrasados";
            }
            if ($this->daoRevisao->inserir($this->revisao)) {
                return true;
            } else {
                $this->erros[] = "Erro ao inserir o registro";
                return false;
            }
        } else {
            return false;
        }
    }

    public function excluir($id) {
        if ($this->daoRevisao->excluir($id)) {
            return true;
        } else {
            $this->erros[] = "Erro eo excluir o registro";
            return false;
        }
    }

    public function TesteMeses() {
        if (($this->daoRevisao->testeData($this->revisao->getId_veiculo(), $this->revisao->getData()) / 12) >= 1) {
            return true;
        }
        return false;
    }

    public function TesteKm() {
        if ($this->daoRevisao->testeKm($this->revisao->getId_veiculo(), $this->revisao->getKm()) > 10000) {
            return true;
        }
        return false;
    }

    public function listar() {
        return $this->daoRevisao->listar();
    }

    public function selecionar($id) {
        return $this->daoRevisao->selecionar($id);
    }

    function getErros() {
        return $this->erros;
    }

    function getAlerta() {
        return $this->alerta;
    }

}
