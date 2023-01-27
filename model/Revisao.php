<?php

class Revisao {

    private $id;
    private $data;
    private $km;
    private $id_veiculo;

    public function __construct($data = null, $km = null, $id_veiculo = null, $id = null) {
        $this->id = $id;
        $this->data = $data;
        $this->km = $km;
        $this->id_veiculo = $id_veiculo;
    }

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }

    public function getKm() {
        return $this->km;
    }

    public function getId_veiculo() {
        return $this->id_veiculo;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setData($data): void {
        $this->data = $data;
    }

    public function setKm($km): void {
        $this->km = $km;
    }

    public function setId_veiculo($id_veiculo): void {
        $this->id_veiculo = $id_veiculo;
    }
}
