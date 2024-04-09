<?php

namespace App\Models;

use PDO;

class UserModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
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
}
