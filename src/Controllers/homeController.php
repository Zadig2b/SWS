<?php

namespace src\Controllers;


use src\Services\Reponse;
use src\Repositories\CoursesRepository;

class HomeController
{
  use Reponse;
  public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }
    $this->render("includes.header", ["erreur" => $erreur]);

    $this->render("auth.login", ["erreur" => $erreur]);
  }

  public function home(): void
  {

    $this->render("includes.header");

    $this->render("accueil.home");
  }
  public function fetchCourse()
  {
    $coursesRepository = new CoursesRepository();
    $courses = $coursesRepository->getCourses();
    echo json_encode($courses);
  }
  
  public function registration()
  {
    $this->render("register");
  }

  public function confirmView()
  {
    
    $this->render("confirmRegistration");
  }
}
