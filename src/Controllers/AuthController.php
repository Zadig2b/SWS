<?php

namespace src\Controllers;

use src\Models\UserModel;
use src\models\Database;
use src\Services\Reponse;
use src\Models\User;
use src\Repositories\CourseRepository;
use src\Repositories\CoursesRepository;
use src\Repositories\UserRepository;

class AuthController
{
    use Reponse;
    public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }
    $this->render("includes.header", ["erreur"=> $erreur]);

    $this->render("auth.login", ["erreur"=> $erreur]);
  }

  public function home(): void
  {

    $this->render("includes.header");

    $this->render("accueil.home");

  }
  public function fetchCourse(){
      $coursesRepository= new CoursesRepository();
      $courses= $coursesRepository->getCourses();
        echo json_encode($courses);
    }  
  
    public function login()
    {

        $db = new Database();
        $pdo = $db->getDB();
        // Assurez-vous que le formulaire de connexion a été soumis
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            // Rediriger l'utilisateur ou afficher un message d'erreur
            return;
        }

        // Récupérez les données du formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Instanciez le modèle d'utilisateur
        $userModel = new User();

        // Appelez la méthode pour vérifier les informations d'identification de l'utilisateur
        $user = $userModel->getUserByEmail($email);

        // Vérifiez si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            // Authentification réussie
            // Enregistrez les informations de l'utilisateur dans la session
            $_SESSION['connected'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role']; // Vous pouvez stocker le rôle de l'utilisateur dans la session

            // Rediriger l'utilisateur vers la page de tableau de bord ou une autre page appropriée
            header('Location: /dashboard');
            exit;
        } else {
            // Authentification échouée
            // Rediriger l'utilisateur vers la page de connexion avec un message d'erreur
            header('Location: /login?error=invalid_credentials');
            exit;
        }
    }

    public function logout()
    {
        // Code pour gérer la déconnexion des utilisateurs
    }

    public function forgotPassword()
    {
        // Code pour gérer la récupération de mot de passe oublié
    }
    public function registration(){
        $this->render("register");
    }
    public function register(){
        $db = new Database();
        $pdo = $db->getDB();
        $userModel = new UserModel($pdo);
        $user = $userModel->createUser($_POST);
        if($user){
            header("Location: /login");
        }
    }
  public function confirmEmail($token){
    $db = new Database();
    $pdo = $db->getDB();
    $userModel = new UserModel($pdo);
    $user = $userModel->getUserByToken($token);
    if($user){
      $userModel->confirmEmail($user['id']);
      header("Location: /login");
    }
  }

  public function confirmView(){
    $this->render("confirmRegistration");
  }
  public function confirmRegistration(){
    $db = new Database();
    $pdo = $db->getDB();
    $userModel = new UserModel($pdo);
    $user = $userModel->createUser($_POST);
    if($user){
      header("Location: /login");
    }
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
}
