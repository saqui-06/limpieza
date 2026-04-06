<?php
// index.php
// Incluimos el header para tener el diseño base y Bootstrap
require_once 'includes/header.php';

// Si el usuario ya está logueado, lo redirigimos a su panel (Dashboard)
if(isset($_SESSION['usuario_id'])){
    header("Location: modulos/dashboard/index.php");
    exit();
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="text-center mb-4">Acceso al Sistema</h3>
                    
                    <form action="modulos/auth/validar.php" method="POST">
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Incluimos el footer
require_once 'includes/footer.php';
?>