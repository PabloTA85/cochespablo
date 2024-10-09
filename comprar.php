<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

// Obtener el coche seleccionado
$coche = isset($_GET['coche']) ? $_GET['coche'] : '';

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Añadir el coche al carrito si se seleccionó uno
if ($coche) {
    $_SESSION['carrito'][] = $coche;
    $_SESSION['mensaje'] = "Has añadido '$coche' al carrito."; // Mensaje de éxito
}

// Redirigir a la página de coches de la marca seleccionada
header("Location: coches.php?marca=" . urlencode($_SESSION['marca'] ?? 'Ford'));
exit();
?>


