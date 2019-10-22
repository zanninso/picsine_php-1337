<?php 
class color
{
    public $red;
    public $green;
    public $blue;
    static $verbose = false;

    public function __construct(array $color)
    {
        if($color["rgb"])
        {
            $this->red = (intval($color["rgb"]) >> 16) & 255;
            $this->green = (intval($color["rgb"]) >> 8) & 255;
            $this->blue = intval($color["rgb"]) & 255;
        }
        else 
        {
            $this->red = intval($color["red"]);
            $this->green = intval($color["green"]);
            $this->blue = intval($color["blue"]);
        }
        if(self::$verbose)
            echo $this->__toString()." constructed\n";
    }

    public function __destruct()
    {
        if(self::$verbose)
            echo $this->__toString()."destructed\n";
    }

    public function __toString()
    {
        return ("Color ( red: $this->red, green: $this->green, blue: $this->blue )");
    }

    static function doc()
    {
        echo  file_get_contents("Color.doc.txt");
    }

    public function add($c)
    {
        $arr = array();
        $arr["red"] = $this->red + $c->red;
        $arr["green"] = $this->green + $c->green;
        $arr["blue"] = $this->blue + $c->blue;
        return new Color($arr);
    }

    public function sub(color $c)
    {
        $arr = array();
        $arr["red"] = $this->red - $c->red;
        $arr["green"] = $this->green - $c->green;
        $arr["blue"] = $this->blue - $c->blue;
        return new Color($arr);
    }

    public function mult($c)
    {
        $arr = array();
        $arr["red"] = $this->red * $c;
        $arr["green"] = $this->green * $c;
        $arr["blue"] = $this->blue * $c;
        return new Color($arr);
    }
}