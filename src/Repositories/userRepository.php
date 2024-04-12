<?php

namespace src\Repositories;

use src\Models\User;
use PDO;
use PDOException;


class UserRepository {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createUser(User $user) {
    $query = "INSERT INTO vercors_user (name, surname, phone, address, email, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($query);
    $stmt->execute([$user->getName(), $user->getSurname(), $user->getPhone(), $user->getAddress(), $user->getEmail(), $user->getPassword()]);
    $userId = $this->db->lastInsertId(); //Obtenez l'ID du dernier utilisateur inséréséréséré
    return $userId; //Renvoyer l'ID utilisateur
}


    public function getUserByEmail($email) {
        $query = "SELECT * FROM vercors_user WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function validateCredentials($email, $password)
{
    try {
        $query = "SELECT * FROM utilisateur WHERE email = :email"; 
        $stmt = $this->db->prepare($query);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); 

        if ($user && password_verify($password, $user['password'])) {
            // Password correct, return the user object
            $userObject = new User(
                $user['nom'],
                $user['prénom'],
                $user['email'],
                $user['password'],
                isset($user['actif']) ? $user['actif'] : '0', 
                isset($user['role']) ? $user['role'] : 'user', 
            );
            $userObject->setId($user['Id_User']); // Set the ID of the user
            return $userObject;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    return null; // Incorrect email/password
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

?>
