<?php

require_once 'Color.class.php';

class Vertex
{
    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;
	static $verbose = false;

	function __construct(array $arr)
	{
        if(!isset($arr["x"]) || !isset($arr["y"]) || !isset($arr["z"]))
            $this->__destruct();
		$this->_x = $arr["x"];
		$this->_y = $arr["y"];
		$this->_z = $arr["z"];
		$this->_w = isset($arr["w"]) ? $arr["w"] : 1.0;
        $this->color = isset($arr["color"]) ? $arr["color"] : new color(array("rgb" => 0xffffff)); 
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
        $string = "Vertex( x: " . number_format($this->_x, 2, '.', ''). ", ";
        $string .= "y: " . number_format($this->_y, 2, '.', '') . ", ";
        $string .= "z:" . number_format($this->_z, 2, '.', '') . ", ";
        $string .= "w:" . number_format($this->_w, 2, '.', '');
		if(self::$verbose)
            $string .= ", " . $this->color;
        $string .= " )";
		return($string);
	}
	
	static function doc()
    {
        return (file_get_contents("Vertex.doc.txt")."\n");
	}
		
	function get_x()
    {
        return $this->_x;
	}
	
    function set_x($value)
    {
        $this->_x = $value;
	}
	
	function get_y()
    {
        return $this->_y;
	}
	
    function set_y($value)
    {
        $this->_y = $value;
	}

	function get_z()
    {
        return $this->_z;
	}
	
    function set_z($value)
    {
        $this->_z = $value;
	}

	function get_w()
    {
        return $this->_w;
	}
	
    function set_w($value)
    {
        $this->_w = $value;
	}

	function get_color()
    {
        return $this->_color;
	}
	
    function set_color($value)
    {
        $this->_color = $value;
	}
}