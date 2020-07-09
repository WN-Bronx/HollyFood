<?php
//Iniciar Sessão
session_start();
//Deletar Sessão
unset($_SESSION["sUsuario"]);
unset($_SESSION["sSenha"]);
//Redirecionamento
echo '<script>window.history.back();</script>';
?>