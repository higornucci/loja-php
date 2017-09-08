<?php
include("conecta.php");
include ("banco-usuario.php");
include("logica-usuario.php");
$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
setcookie("usuario_logado", $usuario["email"], time() + 60);
if($usuario == null) {
    header("Location: index.php?login=0");
} else {
    logaUsuario($usuario["email"]);
    header("Location: index.php?login=1");
}
die();