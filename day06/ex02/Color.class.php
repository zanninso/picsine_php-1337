<?php 
class color
{
    public $red;
    public $green;
    public $blue;
    static $verbose = false;

    public function __construct(array $color)
    {
        if(isset($color["rgb"]))
        {
            $this->red = (intval($color["rgb"]) >> 16) & 255;
            $this->green = (intval($color["rgb"]) >> 8) & 255;
            $this->blue = intval($color["rgb"]) & 255;
        }
        else if(isset($color["red"]) && isset($color["green"]) && isset($color["blue"]))
        {
            $this->red = intval($color["red"]);
            $this->green = intval($color["green"]);
            $this->blue = intval($color["blue"]);
        }
        else 
            $this->__destruct();
        if(self::$verbose)
            echo $this->__toString()." constructed.\n";
    }

    public function __destruct()
    {
        if(self::$verbose)
            echo $this->__toString()." destructed.\n";
    }

    public function __toString()
    {
        $string = "Color( red: ".substr("  ", 0, 3 - strlen((string)$this->red)).$this->red.", ";
        $string .= "green: ".substr("  ", 0, 3 - strlen((string)$this->green)).$this->green.", ";;
        $string .= "blue: ".substr("  ", 0, 3 - strlen((string)$this->blue)).$this->blue." )";
        return ($string);
    }

    static function doc()
    {
        return (file_get_contents("Color.doc.txt")."\n");
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