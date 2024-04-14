<?php

namespace src\Controllers;

use src\models\Database;
use src\Models\User;
use src\Repositories\UserRepository;


class UserController
{

    public function createUserFromInput()
    {
        // Retrieve data from the request
        $data = json_decode(file_get_contents('php://input'));
    
        // Check if data is not null
        if ($data) {
            // Extract data fields and apply htmlspecialchars
            $nom = htmlspecialchars($data->nom);
            $prenom = htmlspecialchars($data->prenom);
            $email = htmlspecialchars($data->email);
    
            // Initialize the database
            $database = new Database();
            $db = $database->getDB();
    
            // Create a new User instance
            $user = new User();
            $user->setNom($nom);
            $user->setPrénom($prenom);
            $user->setEmail($email);
    
            // Initialize UserRepository
            $userRepository = new UserRepository($db);
    
            // Call the method to create the user
            $userId = $userRepository->formateurCreateUser($user);
    
            // Check if user creation was successful
            if ($userId) {
                // Generate token from user ID
                $token = password_hash($userId, PASSWORD_DEFAULT);
    
                      // Initialize UserRepository
        $userRepository = new UserRepository($db);

        // Update the user with the generated token
        $userRepository->updateUserToken($userId, $token);
                // Include token in the email link
                $confirmationLink = "http://sws/cregistration?token=" . urlencode($token);
    
                // Send email to the designated email
                $to = $email;
                $subject = 'Registration Confirmation';
                $message = 'Hello ' . $nom . ', Your account has been successfully created. Please proceed with the registration process by clicking on the following link: ' . $confirmationLink;
                $headers = 'From: your_email@example.com';
    
                // Send email
                $mailSent = mail($to, $subject, $message, $headers);
    
                // Check if email was sent successfully
                if ($mailSent) {
                    echo "User created successfully. Confirmation email sent.";
                } else {
                    echo "User created successfully, but there was an error sending the confirmation email.";
                }
            } else {
                echo "Error creating user.";
            }
        } else {
            echo "Empty request data.";
        }
    }
    
    
    
    public function createStudent()
    {
        // Retrieve data from the request
        $data = json_decode(file_get_contents('php://input'));
    
        // Check if data is not null
        if ($data) {
            // Extract data fields
            $nom = $data->nom;
            $prenom = $data->prenom;
            $email = $data->email;
    
            // Initialize the database
            $database = new Database();
            $db = $database->getDB();
    
            // Initialize UserRepository
            $userRepository = new UserRepository($db);
    
            // Create a new User instance
            $user = new User();
            $user->setNom($nom);
            $user->setPrénom($prenom);
            $user->setEmail($email);
    
            // Call the method to create the student
            $userRepository->formateurCreateUser($user);
    
            // Respond with success message
            echo json_encode(array('message' => 'Student created successfully.'));
        } else {
            // Respond with error message
            http_response_code(400);
            echo json_encode(array('message' => 'Invalid data provided.'));
        }
    }
    
    public function confirmRegistration()
    {
        // Get the password from the request
        $password = $_POST['password'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $database = new Database();
        $db = $database->getDB();
        // Initialize UserRepository and fetch user data from session or request
        $userRepository = new UserRepository($db);
        $user = new User();

        // Update the user's profile in the database with hashed password and set actif to 1
        $userRepository->updateUserAfterRegistration($user, $hashedPassword);

        // Redirect the user to a confirmation page or perform any other action
        header('Location: /testhome'); // Redirect to a confirmation page
    }

    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $database = new Database();
        $db = $database->getDB();
        $userRepository = new UserRepository($db);
        $user = $userRepository->getUserByEmail($email);

        if($user && password_verify($password, $user->password)){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_surname'] = $user->surname;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_role'] = $user->role;
            $_SESSION['user_actif'] = $user->actif;
            $_SESSION['user_password'] = $user->password;
            header('Location: /home');
        }else{
            header('Location: /login');
        }
    }
    public function logout(){
        session_destroy();
        header('Location: /login');
    }

    public function processToken($token)
    {
        // Initialize the database
        $database = new Database();
        $db = $database->getDB();
    
        // Initialize UserRepository
        $userRepository = new UserRepository($db);
    
        // Retrieve user by token
        $user = $userRepository->getUserByToken($token);
    
        if ($user) {
            // Store user data in session
            $_SESSION['user_id'] = $user['Id_utilisateur'];
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_prénom'] = $user['prénom'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['Id_role'];
            $_SESSION['user_actif'] = $user['actif'];
        } else {
            // Handle case where user is not found
            header('Location: /registration-error');
            exit;
        }
    }
    
    
    
    
    
}
