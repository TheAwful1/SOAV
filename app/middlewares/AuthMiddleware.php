<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once __DIR__ .'/.../helpers/jwt_helper.php';
class AuthMiddleware {
   



    public static function user() {
        $headers = getallheaders();

        if (!isset($headers['Authorization'])) {
            return null;
        }

        $token = str_replace('Bearer ', '', $headers['Authorization']);

        try {

            $decoded = JwtHelper::decode($token);
            return [
                'id'=>$decoded->id,
                'email'=>$decoded->email,
                'role'=>$decoded->role

            ];
        } catch (Exception $e) {
            return null;
        }
    }
}
?>