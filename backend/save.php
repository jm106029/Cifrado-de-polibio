<?php

function cifrar_polibio($mensaje) {
    $polibio = array(
        'A' => '11', 'B' => '12', 'C' => '13', 'D' => '14', 'E' => '15',
        'F' => '21', 'G' => '22', 'H' => '23', 'I' => '24', 'J' => '24', // I y J en la misma posición
        'K' => '25', 'L' => '31', 'M' => '32', 'N' => '33', 'O' => '34',
        'P' => '35', 'Q' => '41', 'R' => '42', 'S' => '43', 'T' => '44',
        'U' => '45', 'V' => '51', 'W' => '52', 'X' => '53', 'Y' => '54',
        'Z' => '55'
    );

    $mensaje_cifrado = '';
    $mensaje = strtoupper($mensaje);

 // Cifrar el mensaje letra por letra
    for ($i = 0; $i < strlen($mensaje); $i++) {
        $letra = $mensaje[$i];
        if (isset($polibio[$letra])) {
            $mensaje_cifrado .= $polibio[$letra];
        } else {
// Si la letra no está en el arreglo, mantenerla sin cifrar
            $mensaje_cifrado .= $letra;
        }
    }

    return $mensaje_cifrado;
}

function descifrar_polibio($mensaje_cifrado) {
    $polibio = array(
        '11' => 'A', '12' => 'B', '13' => 'C', '14' => 'D', '15' => 'E',
        '21' => 'F', '22' => 'G', '23' => 'H', '24' => 'J', '25' => 'K',
        '31' => 'L', '32' => 'M', '33' => 'N', '34' => 'O', '35' => 'P',
        '41' => 'Q', '42' => 'R', '43' => 'S', '44' => 'T', '45' => 'U',
        '51' => 'V', '52' => 'W', '53' => 'X', '54' => 'Y', '55' => 'Z'
    );

    $mensaje_descifrado = '';

// Descifrar el mensaje de 2 en 2
    for ($i = 0; $i < strlen($mensaje_cifrado); $i += 2) {
        $letra_cifrada = substr($mensaje_cifrado, $i, 2);
        if (isset($polibio[$letra_cifrada])) {
            $mensaje_descifrado .= $polibio[$letra_cifrada];
        } else {
// Si la letra cifrada no está en el arreglo, mantenerla sin descifrar
            $mensaje_descifrado .= $letra_cifrada;
        }
    }

    return $mensaje_descifrado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cifrar"])) {
        $mensaje = $_POST["mensaje"];
        $mensaje_cifrado = cifrar_polibio($mensaje);
        echo "<div> $mensaje_cifrado</div>";
    } elseif (isset($_POST["descifrar"])) {
        $mensaje_cifrado = $_POST["mensaje_cifrado"];
        $mensaje_descifrado = descifrar_polibio($mensaje_cifrado);
        echo "<div> $mensaje_descifrado</div>";
    }
}
?>
