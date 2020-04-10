<?php

namespace App\Models;

use PDO;

class Donut extends \Core\Model
{
    public $Id;
    public $Name;
    public $ShortDescription;
    public $LongDescription;
    public $Price;

    private $allDonuts = [];

    public function __contructor()
    {
        
    }

    public static function getDonutById($id)
    {
        $db = static::getDB();
        $stmt = $db->prepare("SELECT id, name, shortDescription, longDescription, price, isDonutOfTheWeek, image FROM Donut Where id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // private function selectDonutImageById($id)
    // {
    //     $db = static::getDB();
    //     $stmt = $db->prepare("SELECT image FROM Donut Where id=:id");
    //     $stmt->execute(['id' => $id]);
    //     return $stmt->fetch();
    // }

    public static function addDonut($donut)
    {
        $db = static::getDB();
        // $donut["isDonutOfTheWeek"] = $donut["isDonutOfTheWeek"] == 'true' ? 1 : 0;
        $stmt = $db->prepare('INSERT 
        INTO 
        Donut 
        (Name, Price, ShortDescription, LongDescription, Image, IsDonutOfTheWeek) 
        VALUES 
        (?, ?, ?, ?, ?, ?)');
        // echo $donut["isDonutOfTheWeek"] . gettype($donut["isDonutOfTheWeek"]);
        return $stmt->execute([$donut["name"], $donut["price"], $donut["shortDescription"], $donut["longDescription"], $donut["image"], $donut["isDonutOfTheWeek"]]);
    }

    public static function updateDonut($donut)
    {
        // var_dump($donut);
        if($donut["image"] == null)
        {
            $db = static::getDB();
            $stmt = $db->prepare("SELECT image FROM Donut Where id=:id");
            $stmt->execute(['id' => $donut["id"]]);
            $donutImage = $stmt->fetch();
            
            if($donutImage["image"] != null) {
                $donut["image"] = $donutImage["image"];
            }
        }
        $db = static::getDB();
        // $donut["isDonutOfTheWeek"] = $donut["isDonutOfTheWeek"] == 'true' ? 1 : 0;
        $stmt = $db->prepare('UPDATE 
        Donut SET 
        Name=?, 
        Price=?, 
        ShortDescription=?,
        LongDescription=?,
        Image=?,
        IsDonutOfTheWeek=? 
        WHERE id=?');
        // echo $donut["isDonutOfTheWeek"] . gettype($donut["isDonutOfTheWeek"]);
        return $stmt->execute([$donut["name"], $donut["price"], $donut["shortDescription"], $donut["longDescription"], $donut["image"], $donut["isDonutOfTheWeek"], $donut["id"]]);
    }

    public static function deleteDonutById($id)
    {
        $db = static::getDB();
        $stmt=$db->prepare("DELETE FROM Donut WHERE id=:id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function getAll()
    {
        // This is where the DB Query will go
        $db = static::getDB();
        $stmt = $db->query('SELECT id, name, shortDescription, longDescription, price, isDonutOfTheWeek, image FROM Donut');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getDonutsOfTheWeek()
    {
        // This is where the DB Query will go
        $db = static::getDB();
        $stmt = $db->query('SELECT id, name, shortDescription, longDescription, price, image FROM Donut where IsDonutOfTheWeek=1');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}