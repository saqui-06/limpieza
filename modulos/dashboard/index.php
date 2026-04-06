<?php
// modulos/dashboard/index.php
require_once '../../includes/header.php';

// Verificamos si hay una sesión activa
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../../index.php");
    exit();
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>
            <p class="text-muted">Has ingresado como: 
                <strong>
                    <?php 
                    if($_SESSION['rol_id'] == 1) echo "Administrador";
                    if($_SESSION['rol_id'] == 2) echo "Ejecutivo de Ventas";
                    if($_SESSION['rol_id'] == 3) echo "Empleado de Limpieza";
                    ?>
                </strong>
            </p>
            <hr>
        </div>
    </div>

    <div class="row g-4 mt-2">
        
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">Gestión de Pedidos</h5>
                    <p class="card-text">Consulta y registra nuevos servicios de limpieza.</p>
                    <a href="../pedidos/index.php" class="btn btn-primary">Ir a Pedidos</a>
                </div>
            </div>
        </div>

        <?php if($_SESSION['rol_id'] == 1 || $_SESSION['rol_id'] == 2): ?>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Directorio de Clientes</h5>
                    <p class="card-text">Administra la base de datos de tus clientes.</p>
                    <a href="../clientes/index.php" class="btn btn-success">Ver Clientes</a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if($_SESSION['rol_id'] == 1): ?>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Personal / Empleados</h5>
                    <p class="card-text">Alta, baja y edición de roles del personal.</p>
                    <a href="../empleados/index.php" class="btn btn-dark">Gestionar Staff</a>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <div class="mt-5">
        <a href="../auth/salir.php" class="btn btn-outline-danger">Cerrar Sesión Segura</a>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>