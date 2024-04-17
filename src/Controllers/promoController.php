<?php

namespace src\Controllers;


use src\Services\Reponse;
use src\Repositories\CoursesRepository;
use src\Repositories\PromoRepository;

class PromoController
{
    use Reponse;

    public function fetchPromo()
    {
        $coursesRepository = new CoursesRepository();
        $promos = $coursesRepository->getPromos();
        echo json_encode($promos);
    }

    public function fetchSinglePromo($promoId)
    {
        $promoRepository = new PromoRepository();
        $promo = $promoRepository->getPromoById($promoId);
        echo json_encode($promo);
    }
}
