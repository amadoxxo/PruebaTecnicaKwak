<?php

class DocumentoService {
    private $repo;

    public function __construct($repo) {
        $this->repo = $repo;
    }

    public function generarCodigo($tipo, $proceso) {
        $ultimo = $this->repo->getUltimoConsecutivo($tipo, $proceso);
        $nuevo = $ultimo + 1;

        $t = $this->repo->getTipo($tipo);
        $p = $this->repo->getProceso($proceso);

        return $t['TIP_PREFIJO'] . '-' . $p['PRO_PREFIJO'] . '-' . $nuevo;
    }

    public function crear($data) {
        $data['codigo'] = $this->generarCodigo($data['tipo'], $data['proceso']);
        return $this->repo->create($data);
    }

    public function obtenerPorId($id) {
        return $this->repo->getById($id);
    }

    public function actualizar($id, $data) {
        return $this->repo->update($id, $data);
    }

    public function obtenerTodos() {
        return $this->repo->getAll();
    }

    public function eliminar($id) {
        return $this->repo->delete($id);
    }
}
