<?php

use src\Repositories\UserRepository;
use src\Services\Reponse;
use PDO;
use src\models\Database;
use src\models\User;
require_once __DIR__ . '/../Services/Render.php';

class SimplonController
{
    use Reponse;
    use User;
    public function homepage()
    {
        $this->render("Simplon");
    }

    public function createUserFromInput()
    {
        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $name = htmlspecialchars($decodedRequest->name);
                $surname = htmlspecialchars($decodedRequest->surname);
                $email = htmlspecialchars($decodedRequest->email);
                $password = htmlspecialchars($decodedRequest->password);

                            //Initialiser la base de données
            $database = new Database();
            $db = $database->getDB();
            $user = new User($name, $surname, $email, $password);
            $user->setName($name);
            $user->setSurname($surname);
            $user->setEmail($email);

            // Initialize UserRepository
            $userRepository = new UserRepository($db);
                $userRepository = new UserRepository($db);
                $userRepository->createUser($user);

                include_once __DIR__ . '/../Views/accueil/home.php';
            }
        }
    }
    public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password']) && isset($_POST['email'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];

        $database = new Database();
        $db = $database->getDB();
        $userRepository = new UserRepository($db);

        //Valider la combinaison email/mot de passe
        $user = $userRepository->validateCredentials($email, $password);

        if ($user) {
            //Mot de passe correct, marque l'utilisateur comme connecté
            $_SESSION['connected'] = true;
            $_SESSION['userId'] = $user->getId(); 
            $_SESSION['name'] = $user->getName(); 
            

            
            //Rediriger l'utilisateur vers la page du tableau de bord
            $this->render('dashboard');
            exit;
        } else {
            $error = "Adresse email ou mot de passe incorrect";
            $this->render('Connexion', ['error' => $error]);
        }
    }

    // Load the login view
    $this->render('Connexion');
}
    
}