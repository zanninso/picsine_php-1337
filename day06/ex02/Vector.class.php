<?php
class Vector
{
    private	$_x;
    private	$_y;
    private	$_z;
    private	$_w;
    static $verbose = false;

    function __construct(array $arr)
	{
		$this->_x = $cmp["x"];
		$this->_y = $cmp["y"];
		$this->_z = $cmp["z"];
		$this->_w = $cmp["w"] ? $cmp["w"] : 1.0;
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
		return("x : $_x y : $_y z : $_z w : $_w");
	}
	
	static function doc()
    {

	}
		
	function get_x()
    {
        return $_x;
	}
	
	function get_y()
    {
        return $_y;
	}

	function get_z()
    {
        return $_z;
	}

	function get_w()
    {
        return $_w;
    }
    
    function magnitude()
    {

    }

    function normalize()
    {

    }

    function add(Vector $rhs)
    {

    }

    function sub(Vector $rhs)
    {

    }
    function opposite()
    {

    }
    function scalarProduct($k)
    {

    }
    function dotProduct(Vector $rhs)
    {

    }
    function cos( Vector $rhs )
    {

    }
    function crossProduct(Vector $rhs)
    {

    }
}