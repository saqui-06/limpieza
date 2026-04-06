<?php
// config/conexion.php

// Definimos las credenciales de la base de datos
$host = 'localhost';
$dbname = 'limpieza_app'; // Asegúrate de que tu BD se llame así en phpMyAdmin
$username = 'root'; // Usuario por defecto en XAMPP/WAMP
$password = ''; // Contraseña por defecto (vacía en XAMPP)

try {
    // Creamos la conexión PDO
    // charset=utf8mb4 asegura que los caracteres especiales y tildes se guarden correctamente
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // Configuramos PDO para que lance excepciones si ocurre un error
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    // Si hay un error, detenemos la ejecución y mostramos el mensaje
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>