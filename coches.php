<?php
// Inicia una sesión para el manejo de usuarios
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si no hay usuario en la sesión, redirige a la página de login
    header("Location: login.html");
    exit(); 
}

// Obtenemos la marca seleccionada de la URL (parámetro GET)
$marca = isset($_GET['marca']) ? $_GET['marca'] : ''; // Asigna la marca o vacío si no está definida
// Guardamos la marca en la sesión para uso futuro
$_SESSION['marca'] = $marca; 

// Definición de coches por marca
$coches = [
    'Ford' => ['Mustang', 'Fiesta', 'Focus'],
    'Toyota' => ['Corolla', 'Camry', 'Hilux'],
    'Chevrolet' => ['Camaro', 'Cruze', 'Silverado'],
    'BMW' => ['X5', 'M3', 'Z4'],
    'Audi' => ['A4', 'Q7', 'TT']
];

// Verifica si la marca seleccionada existe en el array de coches
$coche_listado = array_key_exists($marca, $coches) ? $coches[$marca] : []; // Si existe, se obtiene la lista de coches; de lo contrario, se







