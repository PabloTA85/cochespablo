<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

if (isset($_POST['index']) && isset($_SESSION['carrito'])) {
    $index = intval($_POST['index']);
    if (array_key_exists($index, $_SESSION['carrito'])) {
        unset($_SESSION['carrito'][$index]);
        // Reindexar el array para que los índices sean continuos
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    }
}

header("Location: carrito.php");
exit();
?>
