<?php
// modulos/servicios/index.php
require_once '../../includes/header.php';
require_once '../../config/conexion.php';

// Verificamos si el usuario tiene permiso (Admin o Ejecutivo de ventas)
if (!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] == 3) {
    echo "<div class='alert alert-danger'>No tienes permisos para acceder a esta sección.</div>";
    exit();
}

// Consultamos todos los servicios de la base de datos
$query = $conexion->query("SELECT * FROM servicios");
$servicios = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Catálogo de Servicios</h2>
        <?php if($_SESSION['rol_id'] == 1): // Solo el Admin puede añadir ?>
            <a href="crear.php" class="btn btn-success">Nuevo Servicio</a>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($servicios as $s): ?>
                <tr>
                    <td><?php echo $s['id']; ?></td>
                    <td><?php echo $s['nombre']; ?></td>
                    <td><?php echo $s['descripcion']; ?></td>
                    <td>$<?php echo number_format($s['precio'], 2); ?></td>
                    <td>
                        <button class="btn btn-sm btn-info text-white">Editar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../../includes/header.php'; ?>