<?php
// modulos/pedidos/index.php
require_once '../../includes/header.php';
require_once '../../config/conexion.php';

// Consulta con JOIN para traer nombres en lugar de IDs
$sql = "SELECT p.id, c.nombre as cliente, e.nombre as empleado, s.nombre as servicio, 
               p.fecha, p.hora, p.estado 
        FROM pedidos p
        JOIN clientes c ON p.cliente_id = c.id
        JOIN empleados e ON p.empleado_id = e.id
        JOIN servicios s ON p.servicio_id = s.id
        ORDER BY p.fecha DESC";

$stmt = $conexion->query($sql);
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-4">
    <h2>Gestión de Pedidos de Limpieza</h2>
    <a href="crear.php" class="btn btn-primary mb-3">Registrar Nuevo Pedido</a>

    <table class="table table-bordered bg-white shadow-sm">
        <thead class="table-secondary">
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Asignado a</th>
                <th>Fecha/Hora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pedidos as $p): ?>
            <tr>
                <td>#<?php echo $p['id']; ?></td>
                <td><?php echo $p['cliente']; ?></td>
                <td><?php echo $p['servicio']; ?></td>
                <td><?php echo $p['empleado']; ?></td>
                <td><?php echo $p['fecha'] . " " . $p['hora']; ?></td>
                <td>
                    <span class="badge <?php echo ($p['estado'] == 'Pendiente') ? 'bg-warning' : 'bg-success'; ?>">
                        <?php echo $p['estado']; ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>