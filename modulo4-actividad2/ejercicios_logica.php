<?php
// =============================================
// FUNCIONES
// =============================================

// Serie Fibonacci
function generarFibonacci($n) {
    $fibonacci = [];
    if ($n <= 0) return $fibonacci;

    $fibonacci[] = 0;
    if ($n > 1) {
        $fibonacci[] = 1;
        for ($i = 2; $i < $n; $i++) {
            $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        }
    }
    return $fibonacci;
}

// Números primos
function esPrimo($numero) {
    if ($numero <= 1) return false;
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) return false;
    }
    return true;
}

// Palíndromos
function esPalindromo($texto) {
    $texto = strtolower(str_replace(' ', '', $texto));
    return $texto === strrev($texto);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios de Lógica en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
            margin: 5px 0;
            padding: 8px;
        }
        .resultado {
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            width: fit-content;
        }
        .exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
    </style>
</head>
<body>
    <h1>Ejercicios de Lógica en PHP</h1>

    <!-- FORMULARIO FIBONACCI -->
    <h2>Serie Fibonacci</h2>
    <form method="post">
        <label>¿Cuántos términos deseas generar?</label><br>
        <input type="number" name="fibonacci_n" required>
        <button type="submit" name="calcular_fibonacci">Calcular</button>
    </form>

    <?php
    if (isset($_POST['calcular_fibonacci'])) {
        $n = intval($_POST['fibonacci_n']);
        $serie = generarFibonacci($n);
        echo "<div class='resultado info'><strong>Serie de $n términos:</strong><br>" . implode(", ", $serie) . "</div>";
    }
    ?>

    <hr>

    <!-- FORMULARIO PRIMOS -->
    <h2>Verificar Número Primo</h2>
    <form method="post">
        <label>Ingresa un número:</label><br>
        <input type="number" name="numero_primo" required>
        <button type="submit" name="verificar_primo">Verificar</button>
    </form>

    <?php
    if (isset($_POST['verificar_primo'])) {
        $num = intval($_POST['numero_primo']);
        if (esPrimo($num)) {
            echo "<div class='resultado exito'>El número <strong>$num</strong> es primo ✅</div>";
        } else {
            echo "<div class='resultado error'>El número <strong>$num</strong> no es primo ❌</div>";
        }
    }
    ?>

    <hr>

    <!-- FORMULARIO PALÍNDROMOS -->
    <h2>Verificar Palíndromo</h2>
    <form method="post">
        <label>Ingresa una palabra o frase:</label><br>
        <input type="text" name="texto_palindromo" required>
        <button type="submit" name="verificar_palindromo">Verificar</button>
    </form>

    <?php
    if (isset($_POST['verificar_palindromo'])) {
        $texto = $_POST['texto_palindromo'];
        if (esPalindromo($texto)) {
            echo "<div class='resultado exito'>La frase <strong>'$texto'</strong> es un palíndromo ✅</div>";
        } else {
            echo "<div class='resultado error'>La frase <strong>'$texto'</strong> no es un palíndromo ❌</div>";
        }
    }
    ?>
</body>
</html>
