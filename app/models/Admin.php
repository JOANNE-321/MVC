<?php
namespace App\Models;

use App\Core\Model;

class Admin extends Model
{
    public function findByUsername($username)
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->getConnection()->prepare("INSERT INTO admins (username, password, created_at) VALUES (:username, :password, NOW())");
        return $stmt->execute([
            ':username' => $data['username'],
            ':password' => $data['password']
        ]);
    }
}
