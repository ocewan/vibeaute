<?php 

namespace App\Controller;

class PageController extends Controller
{ 

    public function home() : void
    {
        $this->render("pages/home");
    }

    public function about()
    {
        echo "This is the about page.";
    }

    public function contact()
    {
        echo "Feel free to contact us!";
    }


}