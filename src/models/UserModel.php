<?php

namespace src\Models;

use PDO;

class UserModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function createUser($data)
    {
        $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    public function getUserByEmail($email)
    {
        // Code pour récupérer un utilisateur par son email
    }

    public function addUser($data)
    {
        // Code pour ajouter un nouvel utilisateur
    }

    public function updateUser($id, $data)
    {
        // Code pour mettre à jour les informations d'un utilisateur
    }

    public function deleteUser($id)
    {
        // Code pour supprimer un utilisateur
    }
    public function getUserByToken(){
        $query = "SELECT * FROM users WHERE token = :token";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['token' => $_SESSION['token']]);
        return $stmt->fetch();
    }
    public function confirmEmail($token){
        $query = "UPDATE users SET is_verified = 1 WHERE token = :token";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['token' => $token]);
    }
}

