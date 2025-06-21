<?php 

namespace App\Controller;

class PageController extends Controller
{ 

    public function home() : void
    {
        $this->render("pages/home");
    }

    public function contact()
    {
        echo "<h1>Contactez nous !</h1>";
    }

}