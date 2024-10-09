<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no hay usuario en la sesión, redirige a la página de login
    header("Location: login.html");
    exit(); 
}

// Obtiene el carrito de compras de la sesión, o inicializa un array vacío si no existe
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

// Incluye el archivo HTML que muestra el contenido del carrito
include 'carrito.html';
?>

