<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper {

    public static function generate(array $user) {
        $config = require __DIR__ . '/../config/jwt.php';

        $payload = [
            
            'iss' => 'SOAV',
            'iat' => time(),
            'exp' => time() + $config['expire'],
            'user'=>[
                'id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role'],
            ]
        ];

        return JWT::encode($payload, $config['secret'], $config['algo']);
    }

    public static function decode($token) {
        try {
        $config = require __DIR__ . '/../config/jwt.php';
        $decoded = JWT::decode($token, new Key($config['secret'], $config['algo']));
        return (array) $decoded->user;
    } catch (Exception $e) {
        return null;
    }
    }
}
?>