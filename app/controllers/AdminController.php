<?php
class AdminController {

public function dashboard() {
    AdminMiddleware::check();

    View::render('Admin/dashboard', [
        'title' => 'Panel de Administración'
    ]);
}

public function vehicles() {
    AdminMiddleware::check();

    View::render('Admin/vehicles', [
        'title' => 'Vehículos'
    ]);
}

public function usuarios() {
    AdminMiddleware::check();

    View::render('Admin/usuarios', [
        'title' => 'Usuarios'
    ]);
}
}
?>
