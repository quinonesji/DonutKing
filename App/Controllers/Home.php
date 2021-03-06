<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Donut;

class Home extends \Core\Controller
{
    public function indexAction()
    {
        $donuts = Donut::getDonutsOfTheWeek();
        View::renderTemplate('Home/index.html', ['donuts' => $donuts]);
    }
}