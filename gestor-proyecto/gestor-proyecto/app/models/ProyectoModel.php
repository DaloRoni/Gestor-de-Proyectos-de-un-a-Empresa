<?php
require_once __DIR__ . '/Database.php';

class ProyectoModel
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all($limit = 10, $offset = 0)
    {
        $stmt = $this->db->prepare('SELECT * FROM proyecto ORDER BY fecha_creacion DESC LIMIT :lim OFFSET :off');
        $stmt->bindValue(':lim', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':off', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function count()
    {
        $stmt = $this->db->query('SELECT COUNT(*) as c FROM proyecto');
        return (int)$stmt->fetchColumn();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM proyecto WHERE id_proyecto = :id');
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare('INSERT INTO proyecto (nombre, descripcion, id_lider, estado, fecha_inicio, fecha_fin) VALUES (:nombre,:descripcion,:id_lider,:estado,:fecha_inicio,:fecha_fin)');
        return $stmt->execute([
            ':nombre'=>$data['nombre'],
            ':descripcion'=>$data['descripcion'] ?? null,
            ':id_lider'=>$data['id_lider'] ?? 0,
            ':estado'=>$data['estado'] ?? 'Pendiente',
            ':fecha_inicio'=>$data['fecha_inicio'] ?: null,
            ':fecha_fin'=>$data['fecha_fin'] ?: null,
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare('UPDATE proyecto SET nombre=:nombre, descripcion=:descripcion, id_lider=:id_lider, estado=:estado, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin WHERE id_proyecto=:id');
        return $stmt->execute([
            ':nombre'=>$data['nombre'],
            ':descripcion'=>$data['descripcion'] ?? null,
            ':id_lider'=>$data['id_lider'] ?? 0,
            ':estado'=>$data['estado'] ?? 'Pendiente',
            ':fecha_inicio'=>$data['fecha_inicio'] ?: null,
            ':fecha_fin'=>$data['fecha_fin'] ?: null,
            ':id'=>$id,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM proyecto WHERE id_proyecto = :id');
        return $stmt->execute([':id'=>$id]);
    }
}
