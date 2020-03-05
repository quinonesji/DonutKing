<?php

namespace App\Controllers;

use \Core\View;

class Donuts extends \Core\Controller
{
    public function indexAction()
    {
        echo 'Hello from the index action in the Donuts controller!';
        // echo '<p> Query string parameters: <pre>' . 
        //     htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }

    public function addAction()
    {
        //make sure the value of checkbox is either true(1) or false(0)
        // if(!isset($_POST['isDonutOfWeek'])) {
        //     $_POST['isDonutOfWeek'] = "0";
        // }else{
        //   $_POST['isDonutOfWeek'] = "1";
        // }

        /*
        * Headers START
        */
        //Save $keys into $headers array to save to first row of the file.
        // $headers = [];
        // $counter = 0;
        // foreach($_POST as $key => $value) {
        //     $headers[$counter] = $key;
        //     $counter = $counter + 1;
        // }
        // $overWriteHeadersPresentInFile = fopen(dirname(__DIR__) . '/Models/donuts.txt', 'r+');
        // fwrite($overWriteHeadersPresentInFile, implode(',', $headers));
        // fclose($overWriteHeadersPresentInFile);
        /*
        * Headers END
        */

        /*
        * Grab max id already saved in file and increment by 1
        */
        $getMaxIdFromFile = fopen(dirname(__DIR__) . '/Models/donuts.txt', 'a+');
        fgets($getMaxIdFromFile); //skip first line
        $maxId = 0;
        while(!feof($getMaxIdFromFile)) {
            $row = explode(",", fgets($getMaxIdFromFile));
            $maxId = (int)$row[0] + 1; //this is the max Id returned from the file incremented by one
          }
          fclose($getMaxIdFromFile);
        /*
        * Grab max id already saved in file and increment by 1
        */
        if($maxId == 0) {
          $maxId = 1;
        }
        $_POST["id"] = $maxId;

        /*
        *
        *finally write the posted result to file
        */

          $saveDataToFile = fopen(dirname(__DIR__) . '/Models/donuts.txt', 'a+');
        //   fgets($saveDataToFile); //skip first line
          fwrite($saveDataToFile, "\n");
          fwrite($saveDataToFile, implode(',', $_POST));
          fclose($saveDataToFile);
        /*
        *
        *finally write the posted result to file
        */
        
        View::renderTemplate('Donuts/addNew.html', ['added'=>true]);
    }

    public function addNewAction()
    {
        View::renderTemplate('Donuts/addNew.html');
    }
    public function editAction()
    {
        echo 'Hello from the edit action in the Donuts controller!';
        echo '<p>Route Parameters: <pre>' . 
                htmlspecialchars(print_r($this->route_params,true)) . '</pre></p>';
    }
}