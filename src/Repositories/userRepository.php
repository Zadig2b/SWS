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

    public function formateurCreateUser(User $user) {
    $query = "INSERT INTO utilisateur (nom, prénom, email) VALUES (?, ?, ?)";
    $stmt = $this->db->prepare($query);
    $stmt->execute([$user->getNom(), $user->getPrénom(),  $user->getEmail()]);
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

public function updateUserAfterRegistration(User $user, string $hashedPassword)
{
    try {
        // Update the user's profile in the database with hashed password and set actif to 1
        $query = "UPDATE utilisateur SET password = :password, actif = 1 WHERE Id_utilisateur = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':userId', $user->getId());
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle any database errors here
        // For example:
        echo "Error updating user: " . $e->getMessage();
    }
}


}

?>
