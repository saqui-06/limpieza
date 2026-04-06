<?php
// modulos/empleados/guardar.php
session_start();
require_once '../../config/conexion.php';

// Solo el Administrador puede registrar personal
if ($_SESSION['rol_id'] != 1) { exit("Acceso denegado"); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol_id = $_POST['rol_id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass   = $_POST['contrasena']; // Recuerda: usar password_hash() en producción
    $fnac   = $_POST['fecha_nacimiento'];
    $gen    = $_POST['genero'];

    try {
        $sql = "INSERT INTO empleados (rol_id, nombre, correo, contrasena, fecha_nacimiento, genero) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$rol_id, $nombre, $correo, $pass, $fnac, $gen]);

        echo "<script>alert('Empleado registrado'); window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>