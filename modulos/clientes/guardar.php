<?php
// modulos/clientes/guardar_cliente.php
session_start();
require_once '../../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recolección de datos
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $pass   = $_POST['contrasena']; 
    $tel    = trim($_POST['telefono']);

    try {
        // Preparamos la inserción
        $sql = "INSERT INTO clientes (nombre, correo, contrasena, telefono) 
                VALUES (:nom, :cor, :pass, :tel)";
        $stmt = $conexion->prepare($sql);
        
        $stmt->execute([
            ':nom'  => $nombre,
            ':cor'  => $correo,
            ':pass' => $pass, // En un sistema real, usar password_hash()
            ':tel'  => $tel
        ]);

        echo "<script>alert('Cliente registrado correctamente'); window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        // Error común: correo duplicado
        echo "<script>alert('Error: El correo ya está registrado'); window.history.back();</script>";
    }
}
?>