<html>
<head>
    <title>Minha loja</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/loja.css" rel="stylesheet"/>
</head>
<body>
<?php include("logica-usuario.php")?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Minha Loja</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="produto-formulario.php">Adiciona Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produto-lista.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre.php">Sobre</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (usuarioEstaLogado()) { ?>
                    <li>
                        <p class="navbar-text">Logado como <?= usuarioLogado() ?></p>
                    </li>
                    <li class="nav-item pull-xs-right">
                        <a class="nav-link" href="logout.php">Deslogar</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</div>

<div class="container">

    <div class="principal">
