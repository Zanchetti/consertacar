<?php

class Veiculo {

    private $id;
    private $modelo;
    private $placa;
    private $ano;
    private $id_cliente;
    private $id_fabricante;

    public function __construct($modelo = null, $placa = null, $ano = null, $id_cliente = null, $id_fabricante = null, $id = null) {
        $this->id = $id;
        $this->modelo = $modelo;
        $this->placa = $placa;
        $this->ano = $ano;
        $this->id_cliente = $id_cliente;
        $this->id_fabricante = $id_fabricante;
    }

    public function getId() {
        return $this->id;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setId_cliente($id_cliente): void {
        $this->id_cliente = $id_cliente;
    }

    public function setId_fabricante($id_fabricante): void {
        $this->id_fabricante = $id_fabricante;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function getAno() {
        return $this->ano;
    }

    public function getId_cliente() {
        return $this->id_cliente;
    }

    public function getId_fabricante() {
        return $this->id_fabricante;
    }

    public function setModelo($modelo): void {
        $this->modelo = $modelo;
    }

    public function setPlaca($placa): void {
        $this->placa = $placa;
    }

    public function setAno($ano): void {
        $this->ano = $ano;
    }

}
