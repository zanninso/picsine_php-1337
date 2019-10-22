<?php 
class color
{
    public $red;
    public $green;
    public $blue;
    static $verbose = false;

    public function __construct($color, $red=0, $green=0, $blue=0)
    {
        if($color === NULL)
        {
            $this->$red = intval($red);
            $this->$green = intval($green);
            $this->$blue = intval($blue);
        }
        else 
        {
            $this->$red = intval($color["red"]);
            $this->$green = intval($color["green"]);
            $this->$blue = intval($color["blue"]);
        }
    }

    public function __destruct()
    {
        if($verbose === true)
        {
            echo "verbose\n";
        }
    }

    function __toString()
    {
        return ("red : $red green : $green blue : $bleu");
    }

    static function doc()
    {

    }

    public function add(color $c)
    {
        $this->red += $c->red;
        $this->green += $c->green;
        $this->blue += $c->blue;
    }

    public function sub(color $c)
    {
        $this->red -= $c->red;
        $this->green -= $c->green;
        $this->blue -= $c->blue;
    }

    public function mult(color $c)
    {
        $this->red *= $c->red;
        $this->green *= $c->green;
        $this->blue *= $c->blue;
    }
}