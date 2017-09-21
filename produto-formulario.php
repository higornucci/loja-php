<?php include("cabecalho.php");
require_once("conecta.php");
require_once("banco-categoria.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");
verificaUsuario();
$categorias = listaCategorias($conexao);
$categoria = new Categoria();
$categoria->setId(1);

$produto = new Produto("", "", "", $categoria, "");
$usado = "";
?>
<h1>Formulário de cadastro</h1>
<form action="adiciona-produto.php" method="post">
    <table class="table">
        <?php
        include("produto-formulario-base.php");
        ?>
        <tr>
            <td>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>
