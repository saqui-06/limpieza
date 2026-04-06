<?php
// modulos/auth/validar.php
session_start();

// Requerimos la conexión a la base de datos
require_once '../../config/conexion.php';

// Verificamos que los datos hayan sido enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Recibimos y limpiamos las variables para evitar inyecciones básicas
    $correo = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    try {
        // Preparamos la consulta para buscar al empleado por su correo
        // Usamos parámetros (':correo') por seguridad
        $stmt = $conexion->prepare("SELECT id, rol_id, nombre, contrasena FROM empleados WHERE correo = :correo");
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        // Obtenemos el registro (si existe)
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificamos si el usuario existe y si la contraseña es correcta
        // Nota: En producción usar password_verify($contrasena, $usuario['contrasena'])
        if ($usuario && $usuario['contrasena'] == $contrasena) {
            
            // Si es correcto, creamos las variables de sesión
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['rol_id'] = $usuario['rol_id'];
            $_SESSION['nombre'] = $usuario['nombre'];

            // Redirigimos al panel principal
            header("Location: ../dashboard/index.php");
            exit();

        } else {
            // Credenciales incorrectas, regresamos al login con un error (puedes manejar esto mejor luego)
            echo "<script>alert('Correo o contraseña incorrectos'); window.location.href='../../index.php';</script>";
        }

    } catch(PDOException $e) {
        die("Error en la validación: " . $e->getMessage());
    }
} else {
    // Si intentan entrar a este archivo directamente por la URL, los regresamos
    header("Location: ../../index.php");
    exit();
}
?>
<? include("");

