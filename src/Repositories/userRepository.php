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

public function updateUserToken($userId, $token)
{
    try {
        // Prepare the update query
        $query = "UPDATE utilisateur SET token = :token WHERE Id_utilisateur = :userId";
        $stmt = $this->db->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':userId', $userId);
        
        // Execute the update query
        $stmt->execute();
        
        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            // Token updated successfully
            return true;
        } else {
            // No rows affected, token update failed
            return false;
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error updating token: " . $e->getMessage();
        return false;
    }
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

public function getUserByToken($token)
{
    $query = "SELECT * FROM utilisateur WHERE token = :token";
    $stmt = $this->db->prepare($query);
    $stmt->execute(['token' => $token]);
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
public function getUserById($id) {
    $query = "SELECT * FROM utilisateur WHERE Id_utilisateur = ?";
    $stmt = $this->db->prepare($query);
    $stmt->execute([$id]);
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        // Create a new User object and populate its properties
        $user = new User();
        $user->setId($userData['Id_utilisateur']);
        $user->setNom($userData['nom']);
        $user->setPrénom($userData['prénom']);
        $user->setEmail($userData['email']);
        $user->setRole($userData['role']);
        $user->setActif($userData['actif']);

        return $user;
    } else {
        // Return null or handle the case where user is not found
        return null;
    }
}




}

?>
