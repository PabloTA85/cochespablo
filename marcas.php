<?php
// Inicia una sesión para el manejo de usuarios
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no hay usuario en la sesión, redirige a la página de login
    header("Location: login.html");
    exit(); 
}

// Define un arreglo con las marcas de coches disponibles
$marcas = [
    'Ford',
    'Toyota',
    'Chevrolet',
    'BMW',
    'Audi'
];

// Incluye el archivo HTML que muestra las marcas
include 'marcas.html';
?>


