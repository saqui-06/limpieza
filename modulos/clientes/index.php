<?php
// modulos/clientes/index.php
require_once '../../includes/header.php';
require_once '../../config/conexion.php';

// Consultamos los clientes
$stmt = $conexion->query("SELECT * FROM clientes");
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listado de Clientes</h2>
        <a href="crear.php" class="btn btn-success">+ Nuevo Cliente</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($clientes) > 0): ?>
                        <?php foreach($clientes as $c): ?>
                        <tr>
                            <td><?php echo $c['nombre']; ?></td>
                            <td><?php echo $c['correo']; ?></td>
                            <td><?php echo $c['telefono']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $c['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <button onclick="confirmarEliminar(<?php echo $c['id']; ?>)" class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay clientes registrados aún.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Pequeña función en JS para confirmar antes de borrar
function confirmarEliminar(id) {
    if(confirm('¿Estás seguro de eliminar este cliente? Esta acción no se puede deshacer.')) {
        window.location.href = 'eliminar.php?id=' + id;
    }
}
</script>

<?php require_once '../../includes/footer.php'; ?>