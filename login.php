<?php
// Inicia una sesión para el manejo de usuarios
session_start();

// Verificamos si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos y limpiamos los datos introducidos
    $usuario = trim($_POST['usuario']);
    $contrasena = trim($_POST['contrasena']);
    

    $archivo = 'usuarios.txt';
    $loginExitoso = false; 

    
    $usuarios = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    var_dump($usuarios); 

    // Iteramos a través de cada línea del archivo de usuarios
    foreach ($usuarios as $linea) {
        $linea = trim($linea); 
        $credenciales = explode(':', $linea); 
        
        // Verificamos que la línea contenga ambas credenciales
        if (count($credenciales) === 2) {
            list($u, $c) = $credenciales; 
            // Comprobamos si las credenciales coinciden
            if ($u === $usuario && $c === $contrasena) {
                $loginExitoso = true; 
                $_SESSION['usuario'] = $usuario; 
                break; 
            }
        } else {
            // Para depuración: muestra qué línea no tiene el formato correcto
            echo "Formato incorrecto en la línea: '$linea'<br>";
        }
    }

    // Si el login tuvo éxito, redirige al usuario a la página de marcas
    if ($loginExitoso) {
        header("Location: marcas.php");
        exit(); 
    } else {
        // Si las credenciales son incorrectas, muestra un mensaje de error
        echo "Credenciales incorrectas.";
    }
}
?>



