<?php
    require_once('./processamento/process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet">
    <title>Calculadora</title>
</head>
<body>
    <form method="POST">
        <div class="div">
            <input type="text" class="tela" value="<?= process::exibeVisor()?>" name="tela">
            <br>
            <button type="submit" class="botao" value="1" name="valor">1</button>
            <button type="submit" class="botao" value="2" name="valor">2</button>
            <button type="submit" class="botao" value="3" name="valor">3</button>
            <button type="submit" class="botao" value="divisao" name="operador">/</button>

            <br>
            <button type="submit" class="botao" value="4" name="valor">4</button>
            <button type="submit" class="botao" value="5" name="valor">5</button>
            <button type="submit" class="botao" value="6" name="valor">6</button>
            <button type="submit" class="botao" value="multiplicacao" name="operador">*</button>

            <br>
            <button type="submit" class="botao" value="7" name="valor">7</button>
            <button type="submit" class="botao" value="8" name="valor">8</button>
            <button type="submit" class="botao" value="9" name="valor">9</button>
            <button type="submit" class="botao" value="adicao" name="operador">+</button>
            
            <br>
            <button type="submit" class="botao" value="0" name="valor">0</button>
            <button type="submit" class="botao" value="limpa" name="limpa">C</button>
            <button type="submit" class="botao" value="subtracao" name="operador">-</button>
            <button type="submit" class="botao" value="total" name="total">=</button>
        </div>
        <?php
            $oTeste = new process();
            $oTeste->iniciaProcessamento();
        ?>
    </form>
</body>
</html>