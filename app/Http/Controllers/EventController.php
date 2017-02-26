<?php
/**
 * Created by PhpStorm.
 * User: MahmoudMohamed
 * Date: 25/02/2017
 * Time: 10:11 م
 */

namespace App\Http\Controllers;


class EventController extends controller
{
    private $NUMBER_OF_CHAPTER = 30;
    private $DATE_FORMAT = 'd-m-Y';
    private $WEEK_START_DAY = 'next Saturday';
    private $numberOfWeeks;
    private $sessionsPerWeek = [2, 4, 6];
    private $startDate = '07-02-2017';
    private $sessionsPerChapter = 6;
    public function index(){
        return view('index');
    }
    public function setAll(){

        $this->sessionsPerChapter = $_GET["sessionsPerChapter"];

        $this->startDate = $_GET["start"];

        $i = 0;

        foreach (explode("-", $_GET["sessionDays"]) as $sessionDay){
            $this->sessionsPerWeek[$i] = $sessionDay;
            $i++;
        }
        return $this->getEvent();
    }
    public function getEvent(){
        $this->numberOfWeeks = ($this->NUMBER_OF_CHAPTER * $this->sessionsPerChapter)/sizeof($this->sessionsPerWeek);
        $saturday = strtotime($this->startDate. $this->WEEK_START_DAY);
        for ($j = 0; $j<$this->numberOfWeeks; $j++){
            for ($i = 0; $i<sizeof($this->sessionsPerWeek); $i++){
                $index = (sizeof($this->sessionsPerWeek))*$j + $i;// increment for days array
                $days[$index] = date($this->DATE_FORMAT, strtotime('+'.$this->sessionsPerWeek[$i].' days ',$saturday)-1); // get nth day
            }
            $saturday = strtotime('+1 weeks', $saturday);
        }
        $json = json_encode($days);
        return $days;
    }
}