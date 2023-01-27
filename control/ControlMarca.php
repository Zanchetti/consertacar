<?php

class ControlMarca {

    private $marca;
    private $daoMarca;
    private $erros;

    public function __construct() {
        $this->marca = new Marca();
        $this->daoMarca = new DaoMarca();
        $this->erros = array();
    }

    public function inserir($nome) {
        if (strlen($nome) == 0) {
            $this->erros[] = "Informe o nome da marca: ";
        }

        if (!$this->erros) {
            $this->marca = new Marca($nome);
            if ($this->daoMarca->inserir($this->marca)) {
                return true;
            } else {
                $this->erros[] = "Erro ao inserir o registro";
                return false;
            }
        } else {
            return false;
        }
    }

    public function editar($nome, $id) {
        if (strlen($nome) == 0) {
            $this->erros[] = "Informe o nome da marca";
        }

        if (!$this->erros) {
            $this->marca = new Marca($nome);

            $this->marca->setId($id);
            if ($this->daoMarca->editar($this->marca)) {
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
        if ($this->daoMarca->excluir($id)) {
            return true;
        } else {
            $this->erros[] = "Erro eo excluir o registro";
            return false;
        }
    }

    public function listar() {
        return $this->daoMarca->listar();
    }

    public function selecionar($id) {
        return $this->daoMarca->selecionar($id);
    }

    function getErros() {
        return $this->erros;
    }

}
