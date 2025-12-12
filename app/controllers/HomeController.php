<?php
class HomeController {//Como este codigo
    public function index() {
        $isAjax = isset($_GET['ajax']);
        if ($isAjax) {
            View::renderPartial("home", [
                "title" => "Inicio"
            ]);
        } else {
            View::render("home", [
                "title" => "Inicio"
            ]);
        }
    }
    
}
?>