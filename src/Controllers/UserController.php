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
        //Récupérer les données de la requête
        $data = json_decode(file_get_contents('php://input'));

        //Vérifiez si les données ne sont pas nulles
        if ($data) {
            //Extraire les champs de données et appliquer htmlspecialchars
            $nom = htmlspecialchars($data->nom);
            $prenom = htmlspecialchars($data->prenom);
            $email = htmlspecialchars($data->email);

            //Initialiser la base de données
            $database = new Database();
            $db = $database->getDB();

            //Créer une nouvelle instance d'utilisateur
            $user = new User();
            $user->setNom($nom);
            $user->setPrénom($prenom);
            $user->setEmail($email);

            // Initialize UserRepository
            $userRepository = new UserRepository($db);

            //Appeler la méthode pour créer l'utilisateur
            $userId = $userRepository->formateurCreateUser($user);

            //Vérifiez si la création de l'utilisateur a réussi
            if ($userId) {
                //Générer un jeton à partir de l'ID utilisateur
                $token = password_hash($userId, PASSWORD_DEFAULT);

                //Initialiser le référentiel utilisateur
                $userRepository = new UserRepository($db);

                //Mettre à jour l'utilisateur avec le jeton généré
                $userRepository->updateUserToken($userId, $token);
                //Inclure le jeton dans le lien de l'e-mail
                $confirmationLink = "http://sws/cregistration?token=" . urlencode($token);

                //Envoyer un e-mail à l'adresse e-mail désignée
                $to = $email;
                $subject = 'Confirmation d\inscription à la plateforme SWS';
                $message = 'Bonjour ' . $prenom . ', 
                un formateur a initié une création de compte vous concernant. 
                
                Pour clôturer votre inscription et choisir votre mot de passe, il vous suffit de cliquer sur le lien suivant: '

                    . $confirmationLink;
                $headers = 'From: your_email@example.com';

                //Envoyer un e-mail
                $mailSent = mail($to, $subject, $message, $headers);

                //Vérifiez si l'e-mail a été envoyé avec succès                
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
        if (isset($_GET['token'])) {
            $token = $_GET['token'];

            $this->processToken($token);
        } else {
            $this->render("includes.header");

            $this->render("auth.login");
        }

        // Get username and surname from session
        $userName = isset($_SESSION['user_nom']) ? $_SESSION['user_nom'] : '';
        $userSurname = isset($_SESSION['user_prénom']) ? $_SESSION['user_prénom'] : '';

        //Transmettre les données à la vue
        $data = [
            'userName' => $userName,
            'userSurname' => $userSurname
        ];

        //Rendre la vue du formulaire d'inscription avec les données
        $this->render("confirmRegistration", $data);
    }


    public function confirmRegistration()
    {
        $request = file_get_contents('php://input');
        $requestData = json_decode($request, true);
    
    
        //Enregistrez les données de la requête pour le débogage

        error_log('Request data: ' . print_r($requestData, true));

        if (isset($requestData['password'])) {
            $password = $requestData['password'];
    
    
            //Enregistrez le mot de passe pour le débogage

            error_log('Password: ' . $password);
    
    
            //Hachez le mot de passe

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    
            //Enregistrer le mot de passe haché pour le débogage

            error_log('Hashed password: ' . $hashedPassword);
    
    

            //Obtenir l'ID utilisateur de la session
            $userId = $_SESSION['user_id'];
    
    

            //Enregistrez l'ID utilisateur pour le débogage
            error_log('User ID: ' . $userId);
    
    

            //Mettre à jour le profil de l'utilisateur dans la base de données avec le mot de passe haché et définir actif sur 1.
            $database = new Database();
            $db = $database->getDB();
            // Initialize UserRepository
            $userRepository = new UserRepository($db);
            $userRepository->updateUserAfterRegistration($userId, $hashedPassword);
            $user = $userRepository->getUserById($userId);
            $_SESSION['connected'] = true;
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_nom'] = $user->getNom();
            $_SESSION['user_prénom'] = $user->getPrénom();
            $_SESSION['user_email'] = $user->getEmail();
            $_SESSION['user_role'] = $user->getRole();
            $_SESSION['user_actif'] = $user->getActif();
            echo json_encode("Login successful.");
        } else {
            //Gérer le cas où le mot de passe n'est pas présent dans les données de la demande
            //Par exemple, afficher un message d'erreur ou rediriger l'utilisateur
            error_log('Password not provided in the request.');
            echo "Password not provided in the request.";
        }
    }


    public function login()
    {
        $request = file_get_contents('php://input');
        $requestData = json_decode($request, true);
    
    
        // Log the request data for debugging

        // Log the request data for debugging
        error_log('Login Request data: ' . print_r($requestData, true));

        if (isset($requestData['email']) && isset($requestData['password'])) {
            $email = $requestData['email'];
            $password = $requestData['password'];
    
    
            // Log the email and password for debugging

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
    public function fetchStudents()
    {
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

    public function fetchStudents2()
    {
        try {
            $database = new Database();
            $db = $database->getDB();
            $userRepository = new UserRepository($db);
            $students = $userRepository->getUsers2();
    
    
            // Return the array of student data as JSON

            // Return the array of student data as JSON
            echo json_encode($students);
        } catch (Exception $e) {
            error_log('Error fetching students: ' . $e->getMessage());
            return json_encode(['Error fetching students']);
        }
    }

    public function getUsersForPromo($promoId){
        try {
            $database = new Database();
            $db = $database->getDB();
            $userRepository = new UserRepository($db);
            $students = $userRepository->getUsersForPromo($promoId);

            echo json_encode($students);
        } catch (Exception $e) {
            error_log('Error fetching students: ' . $e->getMessage());
            return json_encode(['Error fetching students']);
        }
    }
}
