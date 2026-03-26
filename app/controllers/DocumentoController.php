<?php

class DocumentoController {
    private $service;

    public function __construct($service) {
        $this->service = $service;
    }

    public function index() {
        return $this->service->obtenerTodos();
    }

    public function buscar() {
        return $this->service->buscar($_GET['q']);
    }

    public function store() {
        $this->service->crear($_POST);
        header("Location: index.php");
    }

    public function update() {
        $this->service->actualizar($_POST['id'], $_POST);
        header("Location: index.php");
        exit;
    }

    public function edit() {
        return $this->service->obtenerPorId($_GET['id']);
    }

    public function delete() {
        $this->service->eliminar($_GET['id']);
        header("Location: index.php");
    }
}