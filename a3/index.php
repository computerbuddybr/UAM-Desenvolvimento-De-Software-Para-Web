<?php
require 'Controller/ProcessarForm.php';
$processamentoFormulario = new ProcessarForm();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Casa da Tecnologia</title>
    <link rel="stylesheet" href="css/css.css">
    <?php
    if (!$processamentoFormulario->formProcessadoComSucesso) {
        ?>
    <script src="js/ValidacaoForm.js">
        </script>
        <?php
    }
    ?>
</head>
<body>
<main>
    <?php

    if ($processamentoFormulario->processarFormulario()) {
        echo '<h1>' . $processamentoFormulario->mensagem_final . '</h1>';
    } else {
        echo '<h1>' . $processamentoFormulario->mensagem_final . '</h1>';
        require 'View/form.php';
    }

    ?>
</main>

</body>
</html>
