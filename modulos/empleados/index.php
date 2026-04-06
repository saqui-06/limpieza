<?php
// modulos/empleados/index.php
require_once '../../includes/header.php';
require_once '../../config/conexion.php';

// Bloqueo de seguridad: Solo el Administrador (rol 1) entra aquí
if ($_SESSION['rol_id'] != 1) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Acceso denegado. Solo administradores.</div></div>";
    exit();
}

// Consultamos empleados uniendo con la tabla de roles para mostrar el nombre del puesto
$sql = "SELECT e.*, r.nombre as nombre_rol 
        FROM empleados e 
        JOIN roles r ON e.rol_id = r.id";
$stmt = $conexion->query($sql);
$empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Personal</h2>
        <button class="btn btn-dark">Registrar Nuevo Empleado</button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol / Puesto</th>
                    <th>Género</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($empleados as $emp): ?>
                <tr>
                    <td><?php echo $emp['id']; ?></td>
                    <td><?php echo $emp['nombre']; ?></td>
                    <td><?php echo $emp['correo']; ?></td>
                    <td>
                        <span class="badge bg-info text-dark"><?php echo $emp['nombre_rol']; ?></span>
                    </td>
                    <td><?php echo $emp['genero']; ?></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary">Modificar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>