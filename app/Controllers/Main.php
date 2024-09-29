<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Race;
use App\Models\Year;
use CodeIgniter\HTTP\ResponseInterface;

class Main extends BaseController
{
    var $race;
    var $year;
    public function __construct(){
        $this->race= new Race();
        $this->year= new Year();

    }
    
    public function index()
    {
        $this->data["race"] = $this->race->select("country, count(*) as pocet")->groupBy("country")->orderBy("pocet", "desc")->findall();
        return view('seznam', $this->data);
    }
    public function getPrehled($url)
    {
        $this->data["race"] = $this->race->where("country", $url)->findall();
        return view('prehled', $this->data);
    }
    public function getRocnik($id)
    {
        $this->data["year"] = $this->year->join('stage', 'race_year.id = stage.id_race_year',"inner")->join('result', 'stage.id = result.id_stage',"inner")->where("id_race",$id)->where("rank","1")->groupBy('race_year.id')->findall();
        return view('rocnik', $this->data);
    }
}