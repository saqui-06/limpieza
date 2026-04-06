<?php
// modulos/clientes/guardar_cliente.php
session_start();
require_once '../../config/conexion.php'; // Ajusta según tu carpeta de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass   = $_POST['contrasena'];
    $tel    = $_POST['telefono'];

    try {
        $sql = "INSERT INTO clientes (nombre, correo, contrasena, telefono) 
                VALUES (:nom, :cor, :pass, :tel)";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([
            ':nom'  => $nombre,
            ':cor'  => $correo,
            ':pass' => $pass,
            ':tel'  => $tel
        ]);

        echo "<script>
                alert('Cliente guardado con éxito');
                window.location.href='index.php';
              </script>";
    } catch (PDOException $e) {
        echo "Error al guardar: " . $e->getMessage();
    }
}
?>