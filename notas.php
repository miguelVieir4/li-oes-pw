<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="stylenotas.css">
    <title>Calculadora de Notas dos Alunos</title>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Notas</h1>
        <?php
        $media = null;
        $status = '';
        $notas = [null, null, null, null];
        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            for ($i = 0; $i < 4; $i++) {
                $key = "nota" . ($i + 1);
                if (isset($_POST[$key]) && $_POST[$key] !== '') {
                    $nota = filter_var($_POST[$key], FILTER_VALIDATE_FLOAT);
                    if ($nota === false || $nota < 0 || $nota > 10) {
                        $erro = "Por favor, insira notas válidas entre 0 e 10.";
                        break;
                    }
                    $notas[$i] = $nota;
                } else {
                    $erro = "Preencha todas as 4 notas.";
                    break;
                }
            }

            if (!$erro) {
                $media = array_sum($notas) / 4;
                if ($media >= 6) {
                    $status = '<span class="passou">Aluno aprovado! 🎉</span>';
                } else {
                    $status = '<span class="reprovou">Aluno reprovado. 😞</span>';
                }
            }
        }
        ?>
        <form method="POST" action="">
            <?php for ($i = 0; $i < 4; $i++): ?>
                <input 
                    type="number" 
                    name="nota<?php echo $i + 1; ?>" 
                    step="0.01" min="0" max="10" 
                    placeholder="Nota <?php echo $i + 1; ?>" 
                    value="<?php echo htmlspecialchars($notas[$i] ?? ''); ?>"
                    required
                />
            <?php endfor; ?>
            <button type="submit">Calcular Média</button>
        </form>

        <?php if ($erro): ?>
            <div class="resultado" style="color: #f87171;">
                <?php echo htmlspecialchars($erro); ?>
            </div>
        <?php elseif ($media !== null): ?>
            <div class="resultado">
                Média do aluno: <?php echo number_format($media, 2, ',', '.'); ?><br />
                <?php echo $status; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
