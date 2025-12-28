<?php

class AdminMiddleware {

    public static function check() {
        $user = $GLOBALS['currentUser'] ?? null;

        if (!$user || $user['role'] !== 'admin') {
            http_response_code(403);
            View::render('shared/403', [
                'title' => 'Acceso denegado'
            ]);
            exit;
        }
    }
}
