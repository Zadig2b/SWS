<?php

namespace src\Controllers;

use src\models\Database;
use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;
use Exception;
use src\Controllers\HomeController;

class UserController
{
    use Reponse;

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
                $subject = 'Confirmation d\inscription à la plateforme SWS';
                $message = 'Bonjour ' . $nom . ', un formateur a initié une création de compte vous concernant. Pour clôturer votre inscription et choisir votre mot de passe, il vous suffit de cliquer sur le lien suivant: ' . $confirmationLink;
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




    public function confirmView()
    {
        // Check if the token is present in the URL
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            // header("Location:cregistration");
            // Process the token
            $this->processToken($token);
        } else {
            // Token not found in the URL, handle the case accordingly
            $this->render("includes.header");

            $this->render("auth.login");
        }

        // Get username and surname from session
        $userName = isset($_SESSION['user_nom']) ? $_SESSION['user_nom'] : '';
        $userSurname = isset($_SESSION['user_prénom']) ? $_SESSION['user_prénom'] : '';

        // Pass data to the view
        $data = [
            'userName' => $userName,
            'userSurname' => $userSurname
        ];

        // Render the registration form view with data
        $this->render("confirmRegistration", $data);
    }


    public function confirmRegistration()
    {
        // Get the request body from JSON
        $request = file_get_contents('php://input');
        $requestData = json_decode($request, true);
    
        // Log the request data for debugging
        error_log('Request data: ' . print_r($requestData, true));
    
        // Check if the password is present in the request data
        if(isset($requestData['password'])) {
            // Get the password from the request data
            $password = $requestData['password'];
    
            // Log the password for debugging
            error_log('Password: ' . $password);
    
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            // Log the hashed password for debugging
            error_log('Hashed password: ' . $hashedPassword);
    
            // Get user ID from session
            $userId = $_SESSION['user_id'];
    
            // Log the user ID for debugging
            error_log('User ID: ' . $userId);
    
            // Update the user's profile in the database with hashed password and set actif to 1
            $database = new Database();
            $db = $database->getDB();
            // Initialize UserRepository
            $userRepository = new UserRepository($db);
            $userRepository->updateUserAfterRegistration($userId, $hashedPassword);
            $user= $userRepository->getUserById($userId);
            $_SESSION['connected'] = true;
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_nom'] = $user->getNom();
            $_SESSION['user_prénom'] = $user->getPrénom();
            $_SESSION['user_email'] = $user->getEmail();
            $_SESSION['user_role'] = $user->getRole();
            $_SESSION['user_actif'] = $user->getActif();
            echo json_encode("Login successful.");
            
        } else {
            // Handle case where password is not present in the request data
            // For example, display an error message or redirect the user
            error_log('Password not provided in the request.');
            echo "Password not provided in the request.";
        }
        
    }
    

    public function login()
    {
        // Get the request body from JSON
        $request = file_get_contents('php://input');
        $requestData = json_decode($request, true);
    
        // Log the request data for debugging
        error_log('Login Request data: ' . print_r($requestData, true));
    
        // Check if email and password are present in the request data
        if(isset($requestData['email']) && isset($requestData['password'])) {
            // Get the email and password from the request data
            $email = $requestData['email'];
            $password = $requestData['password'];
    
            // Log the email and password for debugging
            error_log('Email: ' . $email);
            error_log('Password: ' . $password);
    
            $database = new Database();
            $db = $database->getDB();
            $userRepository = new UserRepository($db);
            $user = $userRepository->getUserByEmail($email);
    
            if ($user && password_verify($password, $user->password)) {
                $_SESSION['connected'] = true;
                $_SESSION['user_id'] = $user->Id_utilisateur;
                $_SESSION['user_nom'] = $user->nom;
                $_SESSION['user_prénom'] = $user->prénom;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['user_role'] = $user->Id_role;
                $_SESSION['user_actif'] = $user->actif;
                
                echo json_encode("Login successful.");


            } else {
                header('Location: /login');
            }
        } else {
            // Handle case where email or password is not present in the request data
            // For example, display an error message or redirect the user
            error_log('Email or password not provided in the request.');
            echo "Email or password not provided in the request.";
        }
    }
    
    public function logout()
    {
        session_destroy();
        header('Location: /');
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
    public function fetchStudents(){
        try {
            $database = new Database();
            $db = $database->getDB();
            $userRepository = new UserRepository($db);
            $students = $userRepository->getUsers();
    
            // Convert user objects to associative arrays
            $studentData = [];
            foreach ($students as $student) {
                $studentData[] = [
                    'id' => $student->getId(),
                    'nom' => $student->getNom(),
                    'prénom' => $student->getPrénom(),
                    'email' => $student->getEmail(),
                    'role' => $student->getRole(),
                    'actif' => $student->getActif()
                ];
            }
    
            // Return the array of student data as JSON
            echo json_encode($studentData);
        } catch (Exception $e) {
            // Log the error message
            error_log('Error fetching students: ' . $e->getMessage());
            // Return an empty array to indicate failure
            return ['Error fetching students'];
        }
    }
    public function fetchStudents2(){
        try {
            $database = new Database();
            $db = $database->getDB();
            $userRepository = new UserRepository($db);
            $students = $userRepository->getUsers2();
    
            // Return the array of student data as JSON
            echo json_encode($students);
        } catch (Exception $e) {
            // Log the error message
            error_log('Error fetching students: ' . $e->getMessage());
            // Return an empty array to indicate failure
            return json_encode(['Error fetching students']);
        }
    }
    
    
    
    
}
