<?php

namespace src\Controllers;

use src\models\Database;
use src\Models\User;
use src\Repositories\UserRepository;

class UserController
{
    
    public function createUserFromInput()
    {
        $request = file_get_contents('php://input');
    
        if ($request) {
            $decodedRequest = json_decode($request);
    
            if ($decodedRequest) {
                $name = htmlspecialchars($decodedRequest->name);
                $surname = htmlspecialchars($decodedRequest->surname);
                $email = htmlspecialchars($decodedRequest->email);
    
                // Initialize the database
                $database = new Database();
                $db = $database->getDB();
    
                // Create a new User instance
                $user = new User($name, $surname, $email);
    
                // Initialize UserRepository
                $userRepository = new UserRepository($db);
    
                // Call the method to create the user
                $userRepository->formateurCreateUser($user);
    
                // Send email to the designated email
                $to = $email;
                $subject = 'Registration Confirmation';
                $message = 'Hello ' . $name . ', Your account has been successfully created. Please proceed with the registration process.';
                $headers = 'From: your_email@example.com';
    
                // Send email
                $mailSent = mail($to, $subject, $message, $headers);
    
                // Check if email was sent successfully
                if ($mailSent) {
                    echo "User created successfully. Confirmation email sent.";
                } else {
                    echo "User created successfully, but there was an error sending the confirmation email.";
                }
            }
        }
    }

    public function confirmRegistration()
    {
        // Get the password from the request
        $password = $_POST['password'];

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Initialize UserRepository and fetch user data from session or request
        $userRepository = new UserRepository();
        $user = new User();

        // Update the user's profile in the database with hashed password and set actif to 1
        $userRepository->updateUserAfterRegistration($user, $hashedPassword);

        // Redirect the user to a confirmation page or perform any other action
        header('Location: /registration-confirmation'); // Redirect to a confirmation page
    }
    
}
