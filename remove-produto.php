<?php
include("cabecalho.php");
include("conecta.php");
$produtoDao = new ProdutoDao($conexao);
$id = $_POST['id'];
$produtoDao->removeProduto($id);
$_SESSION["success"] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die();