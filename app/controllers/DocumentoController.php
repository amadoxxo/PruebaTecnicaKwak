<?php

class DocumentoController {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function index() {
        return $this->service->obtenerTodos();
    }

    public function store() {
        // var_dump("ENTRA STORE");
        // exit;
        $this->service->crear($_POST);
        header("Location: index.php");
    }

    public function delete() {
        $this->service->eliminar($_GET['id']);
        header("Location: index.php");
    }
}