<?php
session_start();
//se não houver uma sessão crida vai para o login
if (isset($_SESSION['email'])) {
    header("location: painel.php");
    //login
} else {
    header("location: login.php");
}
?>