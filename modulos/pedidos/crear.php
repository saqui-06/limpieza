<?php
// modulos/pedidos/crear.php
require_once '../../includes/header.php';
require_once '../../config/conexion.php';

// Obtenemos los datos para llenar los Selects
$clientes = $conexion->query("SELECT id, nombre FROM clientes")->fetchAll();
$empleados = $conexion->query("SELECT id, nombre FROM empleados WHERE rol_id = 3")->fetchAll(); // Solo limpiadores
$servicios = $conexion->query("SELECT id, nombre, precio FROM servicios")->fetchAll();
?>

<div class="container mt-4">
    <div class="card col-md-8 mx-auto">
        <div class="card-header bg-primary text-white">
            <h4>Registrar Nuevo Pedido</h4>
        </div>
        <div class="card-body">
            <form action="guardar_pedido.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Cliente</label>
                        <select name="cliente_id" class="form-select" required>
                            <?php foreach($clientes as $c): ?>
                                <option value="<?php echo $c['id']; ?>"><?php echo $c['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Servicio a realizar</label>
                        <select name="servicio_id" class="form-select" required>
                            <?php foreach($servicios as $s): ?>
                                <option value="<?php echo $s['id']; ?>"><?php echo $s['nombre']; ?> ($<?php echo $s['precio']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Asignar Empleado</label>
                        <select name="empleado_id" class="form-select" required>
                            <?php foreach($empleados as $e): ?>
                                <option value="<?php echo $e['id']; ?>"><?php echo $e['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Hora</label>
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Generar Pedido</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>