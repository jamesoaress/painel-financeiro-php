<?php
    require_once 'classes/Funcionario.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $func = new Funcionario ();
        $func->adicionarFuncionario($_POST['nome'], $_POST['cpf'], $_POST['cargo'], $_POST['data_nasc']);
        echo "Funcionario cadastrado com sucesso!";
    }

    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Cadastrar Funcionario</h1>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>CPF:</label>
        <input type="text" name="cpf" required><br>
        <label>Cargo:</label>
        <input type="text" step="0.01" name="cargo" required><br>
        <label>Data da Nascimento:</label>
        <input type="date" name="data_nasc" required><br>
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>

<?php
    include 'footer.php';
?>