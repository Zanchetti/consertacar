<?php
require_once '../model/Administador.php';
require_once '../model/DaoLogin.php';
require_once '../control/ControlLogin.php';
$control = new ControlLogin();
session_start();
if (!$control->efetuarLogin($_POST['email'], $_POST['senha'])) {
    echo $control->getErro();
}