<?php
// modulos/clientes/crear.php
require_once '../../includes/header.php';

// Seguridad: Solo Admin (1) o Ejecutivo (2) pueden crear clientes
if (!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] == 3) {
    header("Location: ../dashboard/index.php");
    exit();
}
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Nuevo Cliente</h4>
                </div>
                <div class="card-body">
                    <form action="guardar_cliente.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej. Juan Pérez" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="correo" class="form-control" placeholder="juan@correo.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña para el Cliente</label>
                            <input type="password" name="contrasena" class="form-control" required>
                            <small class="text-muted">El cliente podrá usarla para consultar sus pedidos (opcional).</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" maxlength="10" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Guardar Cliente</button>
                            <a href="index.php" class="btn btn-outline-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>