<?php

namespace App\Models;

class Donut extends \Core\Model
{
    public $Id;
    public $Name;
    public $ShortDescription;
    public $LongDescription;
    public $Price;
    // public $IsDonutOfTheWeek;
    // public $ThumbnailUrl;

    private $allDonuts = [];
    // private $filteredDonutsByIsDonutOfTheWeek = [];

    public function __contructor()
    {
        
    }

    public static function getAll()
    {
        $file = fopen(dirname(__DIR__) . '/Models/donuts.txt', 'r');
        $headers = explode(",", fgets($file));
        $assoc_array = array();
        foreach($headers as $x => $x_value) {
            $assoc_array[$x_value] = "";
        }
        
        $theData = fread($file, filesize(dirname(__DIR__) . '/Models/donuts.txt'));
        
        $my_array = explode("\n", $theData);
        foreach($my_array as $line)
        {
            $tmp = explode(",", $line);
            $tmpAssocArray = [];
            foreach($tmp as $key => $value)
            {
                $tmpAssocArray[$headers[$key]] = $value;
            }
            array_push($assoc_array, $tmpAssocArray);
        }
        
        foreach($assoc_array as $key => $value) 
        {
   
            if($value!="")
            {
                $allDonuts[$key]=$value;
            }
            
        }
        //TODO to be removed once database has been added
        if(count($allDonuts) ==1 ) {
            if($allDonuts[0]["id"] == "")
            {
                $allDonuts = [];
            }
        }
        fclose($file);
        return $allDonuts;
    }

    public static function getDonutsOfTheWeek()
    {
        // This is where the DB Query will go
        
        // $db = static::getDB();
        // $stmt = $db->query('SELECT id, Name, ShortDecription, LongDescription, Price, IsDonutOfTheWeek FROM Donut where IsDonutOfTheWeek=1');
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}