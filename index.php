<?php
    require_once 'classes/Database.php';
    require_once 'classes/Investido.php';
    require_once 'classes/Dividendos.php';

    $investido = new Investido();
    $listarInv = $investido->totalInvestido();

    $dividendo = new Dividendos();
    $listarDiv= $dividendo->totalDividendo();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestão de Ativos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Início</a></li>
                <li><a href="compras.php">Cadastrar Compras</a></li>
                <li><a href="relatorio.php">Relatório</a></li>
                <li><a href="funcionario.php">Cadatrar Funcionario</a></li>
                <li><a href="relatorioFunc.php">Relatório de Funcionários</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="dashboard">
            <h1>Bem-vindo à Gestão de Ativos</h1>
            <p>Este sistema ajuda você a gerenciar seus investimentos em ativos e os dividendos recebidos. Use o menu acima para navegar pelas opções.</p>
            <div class="cards">
                <div class="card">
                    <h2>Total Investido</h2>
                    <?php foreach ($listarInv as $item): ?>
                    <p>R$ <?php echo number_format($item['total_investido'],2, ',', '.');?></p>
                    <?php endforeach?>
                </div>
                <div class="card">
                    <h2>Total de Dividendos</h2>
                    <?php foreach ($listarDiv as $item): ?>
                    <p>R$ <?php echo number_format($item['total_dividendo'],2, ',', '.') ?></p>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Gestão de Ativos. Todos os direitos reservados.</p>
    </footer>
</body>
</html>