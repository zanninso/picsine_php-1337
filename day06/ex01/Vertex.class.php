<?php
require_once "Color.class.php";

class Vertex
{
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;
	static $verbose = false;

	function __construct(array $cmp)
	{
		$this->_x = $cmp["x"];
		$this->_y = $cmp["y"];
		$this->_z = $cmp["z"];
		$this->_w = $cmp["w"] ? $cmp["w"] : 1.0;
        $this->color = $cmp["color"]; 
        if(self::$verbose)
            echo $this->__toString()." constructed\n";
	}
    function __destruct()
    {
        if(self::$verbose)
            echo $this->__toString()." destructed\n";
    }
	public function __toString()
    {
		$string = "Vertex( x:$this->_x, y:$this->_y, z:$this->_z, w:$this->_w";
		if(self::$verbose)
            $string .= ", " . $this->color;
        $string .= " )";
		return($string);
	}
	
	static function doc()
    {

	}
		
	function get_x()
    {
        return $_x;
	}
	
    function set_x($value)
    {
        $this->_x = $value;
	}
	
	function get_y()
    {
        return $_y;
	}
	
    function set_y($value)
    {
        $_y = $value;
	}

	function get_z()
    {
        return $_z;
	}
	
    function set_z($value)
    {
        $_z = $value;
	}

	function get_w()
    {
        return $_w;
	}
	
    function set_w($value)
    {
        $_w = $value;
	}

	function get_color()
    {
        return $_color;
	}
	
    function set_color($value)
    {
        $_color = $value;
	}
}