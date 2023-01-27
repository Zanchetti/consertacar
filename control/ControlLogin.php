<?php

class ControlLogin {

    //put your code here
    private $dao;
    private $administrador;
    private $erros;

    public function __construct() {
        $this->dao = new DaoLogin();
        $this->administrador = new Administador();
        $this->erros = "";
    }

    public function efetuarLogin($email, $senha) {
        $this->administrador->setEmail($email);
        $this->administrador->setSenha(md5($senha));
        if ($this->dao->verificarEmail($this->administrador)) {
            if ($this->dao->getTentativas($this->administrador) < 5) {
                if ($this->dao->efetuarLogin($this->administrador)) {
                    $this->dao->atualizarUltimoAcesso($this->administrador);
                    $this->dao->zerarTentativas($this->administrador);
                    $_SESSION['email'] = $this->administrador->getEmail();
                } else {
                    $this->dao->incrementarTentativas($this->administrador);
                    $this->erros = "E-mail ou senha incorretos";
                    return false;
                }
            } else {
                $this->erros = "Usuário Bloqueado!";
                return false;
            }
        } else {
            $this->erros = "E-mail ou senha incorretos!";
            return false;
        }
    }

    public function getErro() {
        return $this->erros;
    }

    public function efetuarLogout() {
        $_SESSION['email'] = null;
        session_destroy();
    }

}
