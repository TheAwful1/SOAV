<?php

class View {//Para que esto funcione tienes que añadir codigo a los controladores
    public static function render($viewPath, $params = [], $useLayout = true) {

        // Extrae variables en el scope local
        extract($params);

        // Captura el contenido de la vista
        ob_start();
        require __DIR__ . "/../views/$viewPath.php";
        $content = ob_get_clean();

        if(!$useLayout){

            echo $content;
            return;
        }

        $user = $GLOBALS['currentUser'] ?? null;

        if (!$user) {
            $layout = 'layout.php';
        } elseif ($user['role'] === 'admin') {
            $layout = 'Adminlayout.php';
        } else {
            $layout = 'logedlayout.php';
        }
        //Tienes que ver si vas a eliminar esta parte de abajo

        require_once __DIR__ . "/../views/shared/".$layout;
        
        
    }
    public static function renderPartial($viewPath, $params = []) {
        extract($params);
        require __DIR__ . "/../views/$viewPath.php";
    }
    

}
?>