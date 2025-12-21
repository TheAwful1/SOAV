<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper {

    public static function generate(array $user) {
        $config = require __DIR__ . '/../config/jwt.php';

        $payload = [
            'id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role'],
            'iat' => time(),
            'exp' => time() + $config['expire']
        ];

        return JWT::encode($payload, $config['secret'], $config['algo']);
    }

    public static function decode($token) {
        $config = require __DIR__ . '/../config/jwt.php';

        return JWT::decode($token, new Key($config['secret'], $config['algo']));
    }
}
?>