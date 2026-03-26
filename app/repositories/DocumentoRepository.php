<?php

class DocumentoRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM DOC_DOCUMENTO")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search($q) {
        $stmt = $this->db->prepare("SELECT * FROM DOC_DOCUMENTO WHERE DOC_NOMBRE LIKE ? OR DOC_CODIGO LIKE ?");
        $stmt->execute(["%$q%", "%$q%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO DOC_DOCUMENTO (DOC_NOMBRE, DOC_CODIGO, DOC_CONTENIDO, DOC_ID_TIPO, DOC_ID_PROCESO) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nombre'],
            $data['codigo'],
            $data['contenido'],
            $data['tipo'],
            $data['proceso']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM DOC_DOCUMENTO WHERE DOC_ID = ?");
        return $stmt->execute([$id]);
    }

    public function getUltimoConsecutivo($tipoId, $procesoId) {
        $stmt = $this->db->prepare("SELECT MAX(CAST(SUBSTRING_INDEX(DOC_CODIGO, '-', -1) AS UNSIGNED)) as ultimo FROM DOC_DOCUMENTO WHERE DOC_ID_TIPO = ? AND DOC_ID_PROCESO = ?");
        $stmt->execute([$tipoId, $procesoId]);
        return $stmt->fetch()['ultimo'] ?? 0;
    }

    public function getTipo($id) {
        return $this->db->query("SELECT * FROM TIP_TIPO_DOC WHERE TIP_ID = $id")->fetch();
    }

    public function getProceso($id) {
        return $this->db->query("SELECT * FROM PRO_PROCESO WHERE PRO_ID = $id")->fetch();
    }
}
