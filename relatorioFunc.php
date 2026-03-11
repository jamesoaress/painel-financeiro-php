<?php
require_once 'classes/Funcionario.php';

$funcionario = new Funcionario();

if (isset($_POST['btn_excluir']) && isset($_POST['id_funcionario'])) {

    $idParaExcluir = $_POST['id_funcionario'];

    $funcionario->excluirFuncionario($idParaExcluir);

    header("Location: relatorioFunc.php");
    exit;
}

$relatorio = $funcionario->relatorioFuncionario();
include 'header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Ativos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Relatório de Funcionários</h1>
    <div class="container-tabela">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Cargo</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($relatorio as $linha): ?>
            <tr>
                <td><?= $linha['id'] ?></td>
                <td><?= $linha['nome'] ?></td>
                <td><?= $linha['cpf'] ?></td>
                <td><?= $linha ['cargo']?></td>
                <td><?=$linha['data_nasc']?></td>

                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="id_funcionario" value="<?= $linha['id'] ?>">
                        <button type="submit" name="btn_excluir">Excluir</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>

<?php
    include 'footer.php';
?>