<?php

class View {//Para que esto funcione tienes que añadir codigo a los controladores
    public static function render($viewPath, $params = []) {

        // Extrae variables en el scope local
        extract($params);

        // Captura el contenido de la vista
        ob_start();
        require_once __DIR__ . "/../views/$viewPath.php";
        $content = ob_get_clean();

        require_once __DIR__ . "/../views/shared/layout.php";
    }
}
?>