<?php
class Vertex
{
    private			$_x;
    private			$_y;
    private			$_z;
    private			$_w;
    private Color 	$_color;
	static $verbose = false;

	function __construct(array $cmp)
	{
		$this->_x = $cmp["x"];
		$this->_y = $cmp["y"];
		$this->_z = $cmp["z"];
		$this->_w = $cmp["w"] ? $cmp["w"] : 1.0;
		$this->color = new color($cmp["color", 255, 255, 255); 
	}

	function __toString()
    {
		$string = "x : $_x y : $_y z : $_z w : $_w";
		if($verbose)
		$string .= "color : ".$color.tostring();
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
        _x = $value;
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