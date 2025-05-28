<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de IMC</title>    
</head>
<body>
    <div class="container">
        <h1>Calculadora de IMC</h1>

        <?php
        function limpar($valor) {
            return htmlspecialchars(trim($valor));
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = limpar($_POST["nome"] ?? '');
            $altura = floatval($_POST["altura"] ?? 0);
            $peso = floatval($_POST["peso"] ?? 0);

            if ($altura > 0 && $peso > 0) {
                $imc = $peso / ($altura * $altura);
                $imc = round($imc, 2);

                if ($imc < 18.5) {
                    $classificacao = "Abaixo do peso";
                } elseif ($imc < 25) {
                    $classificacao = "Peso normal";
                } elseif ($imc < 30) {
                    $classificacao = "Sobrepeso";
                } elseif ($imc < 35) {
                    $classificacao = "Obesidade grau 1";
                } elseif ($imc < 40) {
                    $classificacao = "Obesidade grau 2";
                } else {
                    $classificacao = "Obesidade grau 3 (mórbida)";
                }

                echo "<div class='resultado'>";
                echo "<h2>Resultado</h2>";
                echo "<p><strong>Nome:</strong> $nome</p>";
                echo "<p><strong>Altura:</strong> " . number_format($altura, 2, ',', '.') . " m</p>";
                echo "<p><strong>Peso:</strong> " . number_format($peso, 1, ',', '.') . " kg</p>";
                echo "<p><strong>IMC:</strong> " . number_format($imc, 2, ',', '.') . "</p>";
                echo "<p><strong>Classificação:</strong> $classificacao</p>";
                echo "</div>";
            } else {
                echo "<div class='erro'><p>Altura e peso devem ser maiores que zero.</p></div>";
            }
        }
        ?>

        <form method="post" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="altura">Altura (em metros):</label>
            <input type="number" id="altura" name="altura" step="0.01" min="0.5" max="3" required>

            <label for="peso">Peso (em kg):</label>
            <input type="number" id="peso" name="peso" step="0.1" min="1" max="500" required>

            <input type="submit" value="Calcular IMC">
        </form>
    </div>
</body>
</html>
