<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $produto1_preco = floatval($_POST['produto1_preco']);
    $produto1_quantidade = intval($_POST['produto1_quantidade']);
    $produto2_preco = floatval($_POST['produto2_preco']);
    $produto2_quantidade = intval($_POST['produto2_quantidade']);
    $valor_pago = floatval($_POST['valor_pago']);

    
    $total_gasto_produto1 = $produto1_preco * $produto1_quantidade;
    $total_gasto_produto2 = $produto2_preco * $produto2_quantidade;
    $total_gasto = $total_gasto_produto1 + $total_gasto_produto2;

    
    $troco = $valor_pago - $total_gasto;

    
    echo "<h1>Conta Fiscal</h1>";
    echo "<p>Produto 1: R$ " . number_format($total_gasto_produto1, 2, ',', '.') . "</p>";
    echo "<p>Produto 2: R$ " . number_format($total_gasto_produto2, 2, ',', '.') . "</p>";
    echo "<p>Total Gasto: R$ " . number_format($total_gasto, 2, ',', '.') . "</p>";
    echo "<p>Valor Pago: R$ " . number_format($valor_pago, 2, ',', '.') . "</p>";
    echo "<p>Troco: R$ " . number_format($troco, 2, ',', '.') . "</p>";
}
?>

<form method="post" action="">
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Compra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="processa.php">
        <h2>Formulário de Compra</h2>
        <label for="produto1_preco">Preço do Produto 1:</label>
        <input type="text" name="produto1_preco" id="produto1_preco" required pattern="^\d+(\,\d{1,2})?$" title="Digite um valor válido, use vírgula para decimais.">
        <label for="produto1_quantidade">Quantidade do Produto 1:</label>
        <input type="number" name="produto1_quantidade" id="produto1_quantidade" required min="1">
        <label for="produto2_preco">Preço do Produto 2:</label>
        <input type="text" name="produto2_preco" id="produto2_preco" required pattern="^\d+(\,\d{1,2})?$" title="Digite um valor válido, use vírgula para decimais.">
        <label for="produto2_quantidade">Quantidade do Produto 2:</label>
        <input type="number" name="produto2_quantidade" id="produto2_quantidade" required min="1">
        <label for="valor_pago">Valor Pago:</label>
        <input type="text" name="valor_pago" id="valor_pago" required pattern="^\d+(\,\d{1,2})?$" title="Digite um valor válido, use vírgula para decimais.">
        <input type="submit" value="Calcular">
    </form>
</body>
</html>