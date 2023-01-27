<?php

class DaoLogin {

    private $conexao;

    public function __construct() {
        $this->conexao = new PDO("mysql:host=localhost;port=3306;dbname=consertacar", "root", "root");
    }

    public function verificarEmail(Administador $admin) {
        return $this->conexao->query("select * from administradores where email = '" . $admin->getEmail() . "'")->fetchObject();
    }

    public function efetuarLogin(Administador $admin) {
        return $this->conexao->query("select * from administradores where email = '"
                        . $admin->getEmail() . "' and senha = '" . $admin->getSenha() . "'")->fetchObject();
    }

    public function getTentativas(Administador $admin) {
        return $this->conexao->query("select tentativas from administradores where email = '" . $admin->getEmail() . "'")->fetchColumn();
    }

    public function incrementarTentativas(Administador $admin) {
        return $this->conexao->exec("update administradores set tentativas = tentativas + 1 where email= '" . $admin->getEmail() . "'");
    }

    public function atualizarUltimoAcesso(Administador $admin) {
        return $this->conexao->exec("update administradores set ultimo_acesso = now() where email = '" . $admin->getEmail() . "'");
    }

    public function zerarTentativas(Administador $admin) {
        return $this->conexao->exec("update administradores set tentativas = 0 where email = '" . $admin->getEmail() . "'");
    }

}
