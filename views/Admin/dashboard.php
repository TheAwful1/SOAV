<h2 class="titulo-dashboard">Panel Principal</h2>

<section class="bienvenida">
    <h3>Bienvenido al Sistema de Alquiler de Vehículos</h3>
    <p>Gestiona usuarios, vehículos, reservas y reportes desde un solo lugar.</p>
</section>

<section class="accesos-rapidos">
    <h3>Accesos Rápidos</h3>
    <div class="grid-access">
        
        <a class="card acceso" href="/views/Admin/usuarios.php">
            <h4>Usuarios</h4>
            <p>Administrar usuarios del sistema.</p>
        </a>

        <a class="card acceso" href="/views/Admin/vehicles.php">
            <h4>Vehículos</h4>
            <p>Registrar o modificar vehículos.</p>
        </a>

        <a class="card acceso" href="/views/Admin/bookings.php">
            <h4>Reservas</h4>
            <p>Gestionar las reservaciones activas.</p>
        </a>

        <a class="card acceso" href="/views/Admin/reports.php">
            <h4>Reportes</h4>
            <p>Ver informes y estadísticas.</p>
        </a>

    </div>
</section>

<section class="estadisticas">
    <h3>Estadísticas Generales</h3>

    <div class="stats-grid">

        <div class="stat-card" id="stat-usuarios">
            <span class="numero">—</span>
            <span class="label">Usuarios Registrados</span>
        </div>

        <div class="stat-card" id="stat-vehiculos">
            <span class="numero">—</span>
            <span class="label">Vehículos Disponibles</span>
        </div>

        <div class="stat-card" id="stat-reservas">
            <span class="numero">—</span>
            <span class="label">Reservas Activas</span>
        </div>

    </div>
</section>

<script type="module" src="/js/dashboard/inicio.js"></script>
