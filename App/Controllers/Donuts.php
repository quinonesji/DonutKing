<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Donut;

class Donuts extends \Core\Controller
{
    public function indexAction()
    {
        echo 'Hello from the index action in the Donuts controller!';
        // echo '<p> Query string parameters: <pre>' . 
        //     htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }

    public function allAction()
    {
        $donuts = Donut::getAll();
        // foreach($donuts as $key => $value) {
        //     if($key=="image"){
        //         echo "data:image/jpeg;base64,'.base64_encode($value).'";
        //         $donuts[$key] = "<img src='/images/AppleCideDoughnuts.jpg' alt='Apple cider donut' class='img-thumbnail'> ";
        //         $value = "<img src='/images/AppleCideDoughnuts.jpg' alt='Apple cider donut' class='img-thumbnail'> ";
        //         // echo $value;
        //         // $value = "<img src=\"data:image\/jpeg;base64,\'.base64_encode(\$donut[\'name\']).\'\" height=\"200\" width=\"200\" class=\"img-thumnail\" /> ";
        //     }
        // }
        // var_dump(base64_encode($donuts));
        // $donuts["image"] = "<img src=\"data:image\/jpeg;base64,\'.base64_encode(\$donut[\'name\']).\'\" height=\"200\" width=\"200\" class=\"img-thumnail\" /> ";
        // $donuts["image"] = "data:image/jpeg;base64,'.base64_encode($donuts['image'] ).'";
        View::renderTemplate('Home/index.html', ['donuts' => $donuts]);
    }

    public function ordersAction()
    {
        View::renderTemplate('Donuts/orders.html');
        // echo 'Welcome to the customers orders placed view.';
    }
}