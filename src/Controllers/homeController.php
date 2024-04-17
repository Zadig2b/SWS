<?php

namespace src\Controllers;


use src\Services\Reponse;
use src\Repositories\CoursesRepository;
use src\Repositories\PromoRepository;

class HomeController
{
  use Reponse;
  public function loginView(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("auth.login", ["erreur" => $erreur]);
  }

  public function home(): void
  {
    if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
      if ($_SESSION['user_role'] == 1) {
        $this->render("accueil.homeV2");
      } elseif ($_SESSION['user_role'] == 2) {
        $this->render("accueil.homeApprenant");
      }
    }
    // $this->loginView();
  }

  public function fetchCourse()
  {
    $coursesRepository = new CoursesRepository();
    $courses = $coursesRepository->getCoursesToday();
    echo json_encode($courses);
  }

  public function fetchPromo()
  {
    $coursesRepository = new CoursesRepository();
    $promos = $coursesRepository->getPromos();
    echo json_encode($promos);
  }
  // In your controller file
public function fetchSinglePromo($promoId) {
  $promoRepository = new PromoRepository();
  $promo = $promoRepository->getPromoById($promoId);
  echo json_encode($promo);
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
