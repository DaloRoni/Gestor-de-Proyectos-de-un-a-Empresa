<?php
require_once __DIR__ . '/Database.php';

class UserModel
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create($name, $email, $passwordHash)
    {
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name,:email,:password)');
        return $stmt->execute([':name'=>$name,':email'=>$email,':password'=>$passwordHash]);
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute([':email'=>$email]);
        return $stmt->fetch();
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch();
    }
}
