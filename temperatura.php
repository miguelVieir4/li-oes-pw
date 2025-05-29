<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style temperatura.css">
    <title>Sensação Térmica do Ambiente</title>
    
</head>
<body>
    <div class="container">
        <h1>Sensação Térmica do Ambiente</h1>

        <?php
        function limpar($valor) {
            return htmlspecialchars(trim($valor));
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = limpar($_POST["nome"] ?? '');
            $temperatura = floatval($_POST["temperatura"] ?? 0);

            if ($temperatura >= -20 && $temperatura <= 60) {
                // Classificação da sensação térmica
                if ($temperatura < 20) {
                    $sensacao = "Frio";
                } elseif ($temperatura < 22) {
                    $sensacao = "Agradável";
                } elseif ($temperatura < 30) {
                    $sensacao = "Quente";
                } else {
                    $sensacao = "Muito quente";
                }

                echo "<div class='resultado'>";
                echo "<h2>Resultado</h2>";
                echo "<p><strong>Nome:</strong> $nome</p>";
                echo "<p><strong>Temperatura ambiente:</strong> " . number_format($temperatura, 1, ',', '.') . " °C</p>";
                echo "<p><strong>Sensação:</strong> $sensacao</p>";
                echo "</div>";
            } else {
                echo "<div class='erro'><p>Temperatura inválida. Insira um valor entre -20°C e 60°C.</p></div>";
            }
        }
        ?>

        <form method="post" action="">
           
            <label for="temperatura">Temperatura ambiente (°C):</label>
            <input type="number" id="temperatura" name="temperatura" step="0.1" min="-20" max="60" required>

            <input type="submit" value="Verificar Sensação Térmica">
        </form>
    </div>
</body>
</html>