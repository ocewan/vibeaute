<?php

namespace App\Controller;

use App\Repository\TarifRepository;

class PageController extends Controller
{

    public function home(): void
    {
        $this->render("pages/home");
    }

    public function tarifs(): void
    {
        $tarifRepository = new TarifRepository();
        $tarifs = $tarifRepository->getAllTarifs();
        $this->render("pages/tarifs", ["tarifs" => $tarifs]);
    }

    public function contact()
    {
        echo "<h1>Contactez nous !</h1>";
    }
}
