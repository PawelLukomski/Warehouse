<?php

namespace Controller;

use Manager\MainManager;
use Manager\Request;

class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $headerLocation = new ArticlesController();

        $headerLocation->indexAction();
        //$this->render("Home/Home.php", $this->param()['mainParams']['pageName']);
    }
}