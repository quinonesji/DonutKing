<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Donut;

class Admin extends \Core\Controller
{

    public function donutsAction()
    {
        $donuts = Donut::getAll();
        View::renderTemplate('Admin/donuts.html', ['donuts' => $donuts]);
    }

    public function addNewAction()
    {
        View::renderTemplate('Admin/addNew.html', ['added' => null]);
    }

    public function editAction()
    {
      $id = intval($this->route_params["id"]);
      $donut = Donut::getDonutById($id);
      View::renderTemplate('Admin/edit.html', ['donut'=> $donut ]);
    }

    public function addAction()
    {
      $error = [];
      if(!isset($_POST["isDonutOfTheWeek"])) {
        $_POST["isDonutOfTheWeek"] = false;
      }
      else {
        $_POST["isDonutOfTheWeek"] = true;
      }
      if($_POST["name"]==null)
      {
        $error["name"]= true;
      }
      if($_POST['price']==null)
      {
        $error["price"] = true;
      }
      if($_POST["shortDescription"] == null){
        $error["shortDescription"] = true;
      }
      if(count($error) > 0)
      {
        View::renderTemplate('Admin/addNew.html', ['error' => $error]);
        return;
      }
      if(count($error) == 0)
      {
        if($_FILES["image"]["name"] != "") {
          if($_FILES["image"]["size"] > 65535) {
            View::renderTemplate('Admin/addNew.html', ['file' => 'The size of the file is larger that 64 KB']);
            return;
          } else {
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
            $_POST["image"] = $file;
          }
          
        }
        else{
          $_POST["image"] = null;
        }
        
        $rows = Donut::addDonut($_POST);
        if($rows > 0) {
          View::renderTemplate('Admin/addNew.html', ['added' => "success"]);
        }
        else if($rows == 0) {
          View::renderTemplate('Admin/addNew.html', ['added' => "fail"]);
        }
      }
    }

    public function updateAction()
    {
      $error = [];
      if(!isset($_POST["isDonutOfTheWeek"])) {
        $_POST["isDonutOfTheWeek"] = false;
      }
      else {
        $_POST["isDonutOfTheWeek"] = true;
      }
      if($_POST["name"]==null)
      {
        $error["name"]= true;
      }
      if($_POST['price']==null)
      {
        $error["price"] = true;
      }
      if($_POST["shortDescription"] == null){
        $error["shortDescription"] = true;
      }
      if(count($error) > 0)
      {
        View::renderTemplate('Admin/edit.html', ['error' => $error]);
        return;
      }
      if(count($error) == 0)
      {
        if($_FILES["image"]["name"] != "") {
          if($_FILES["image"]["size"] > 65535) {
            View::renderTemplate('Admin/edit.html', ['file' => 'The size of the file is larger that 64 KB']);
            return;
          } else {
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
            $_POST["image"] = $file;
          }
          
        }
        else{
          $_POST["image"] = null;
        }
        
        $rows = Donut::updateDonut($_POST);
        if($rows > 0) {
          View::renderTemplate('Admin/donuts.html');
        }
        else if($rows == 0) {
          View::renderTemplate('Admin/edit.html', ['added' => "fail"]);
        }
      }
    }

    public function deleteAction()
    {
      $id = intval($this->route_params["id"]);
      $donut = Donut::deleteDonutById($id);
      View::renderTemplate('Admin/donuts.html');
    }
}