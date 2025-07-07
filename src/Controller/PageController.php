<?php

namespace App\Controller;

use App\Repository\TarifRepository;

class PageController extends Controller
{

    public function home(): void
    {
        $this->render("pages/home");
    }

    public function prestations(): void
    {
        $this->render("pages/prestations");
    }

    public function tarifs(): void
    {
        // $tarifRepository = new TarifRepository();
        // $tarifs = $tarifRepository->getAllTarifs();
        // $this->render("pages/tarifs", ["tarifs" => $tarifs]);
        $this->render("pages/tarifs");
    }

    public function contact()
    {
        $this->render("pages/contact");
    }
}
