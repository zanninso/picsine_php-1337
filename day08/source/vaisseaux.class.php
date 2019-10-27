<?php
class spaceship
{
    protected $name;
    protected $lenght;
    protected $sprite;
    protected $hullPoint;
    protected $enginePower;
    protected $speed;
    protected $handling;
    protected $shield;
    protected $weapons;

    function __construct($arr)
    {
        $this->name = $arr["name"];
        $this->lenght = $arr["lenght"];
        $this->sprite = $arr["sprite"];
        $this->hullPoint = $arr["hullPoint"];
        $this->enginePower = $arr["enginePower"];
        $this->speed = $arr["speed"];
        $this->handling = $arr["handling"];
        $this->shield = $arr["shield"];
        $this->weapons = $arr["weapons"];
    }

    function move()
    {

    }
    
    function order()
    {

    }
}