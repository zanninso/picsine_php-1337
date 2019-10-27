<?php

require_once 'Vertex.class.php';

class Vector
{
    private	$_x;
    private	$_y;
    private	$_z;
    private	$_w;
    static $verbose = false;

    function __construct(array $arr)
	{
        if(!isset($arr["dest"]))
            $thsi->__destruct();
        if(!isset($arr["orig"]))
            $arr["orig"] = new Vertex(array("x" => 0,"y" => 0,"z" => 0,"w" => 1));
        $this->_x = $arr["dest"]->get_x() - $arr["orig"]->get_x();
		$this->_y = $arr["dest"]->get_y() - $arr["orig"]->get_y();
        $this->_z = $arr["dest"]->get_z() - $arr["orig"]->get_z();
        $this->_w = $arr["dest"]->get_w() - $arr["orig"]->get_w();
        if(self::$verbose)
            echo $this->__toString()." constructed\n";
    }
    
    public function __destruct()
    {
        if(self::$verbose)
            echo $this->__toString()." destructed\n";
    }

	function __toString()
    {
		return("Vector( x:".number_format($this->_x, 2, '.', '').", y:".number_format($this->_y, 2, '.', '').", z:".number_format($this->_z, 2, '.', '').", w:".number_format($this->_w, 2, '.', '')." )");
	}
	
	static function doc()
    {
        return (file_get_contents("Vector.doc.txt")."\n");
	}
		
	function get_x()
    {
        return $this->_x;
	}
	
	function get_y()
    {
        return $this->_y;
	}

	function get_z()
    {
        return $this->_z;
	}

	function get_w()
    {
        return $this->_w;
    }
    
    function magnitude()
    {
        return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
    }

    function normalize()
    {
        $m = $this->magnitude();
        $x = $this->_x / $m;
        $y = $this->_y / $m;;
        $z = $this->_z / $m;
        $vertex = new Vertex(array("x" => $x,"y" => $y,"z" => $z));
        return new Vector(array("dest" => $vertex));  
    }

    function add(Vector $rhs)
    {
        $x = $this->_x + $rhs->get_x();
        $y = $this->_y + $rhs->get_y();
        $z = $this->_z + $rhs->get_z();
        $vertex = new Vertex(array("x" => $x,"y" => $y,"z" => $z));
        return new Vector(array("dest" => $vertex));
    }

    function sub(Vector $rhs)
    {
        $x = $this->_x - $rhs->get_x();
        $y = $this->_y - $rhs->get_y();
        $z = $this->_z - $rhs->get_z();
        $vertex = new Vertex(array("x" => $x,"y" => $y,"z" => $z));
        return new Vector(array("dest" => $vertex));
    }

    function opposite()
    {
        $x = $this->_x * -1;
        $y = $this->_y * -1;
        $z = $this->_z * -1;
        $vertex = new Vertex(array("x" => $x,"y" => $y,"z" => $z));
        return new Vector(array("dest" => $vertex));
    }

    function scalarProduct($k)
    {
        $x = $this->_x * $k;
        $y = $this->_y * $k;
        $z = $this->_z * $k;
        $vertex = new Vertex(array("x" => $x,"y" => $y,"z" => $z));
        return new Vector(array("dest" => $vertex));
    }

    function dotProduct(Vector $rhs)
    {
        return ($this->_x * $rhs->get_x()) + ($this->_y * $rhs->get_y()) + ($this->_z * $rhs->get_z());
    }

    function cos( Vector $rhs)
    {
        $mag = $rhs->magnitude();
        $mag1 = $this->magnitude();
        return($this->dotProduct($rhs) / ($mag * $mag1));
    }

    function crossProduct(Vector $rhs)
    {
        $x = ($this->_y * $rhs->get_z()) - ($rhs->get_y() * $this->_z);
        $y = -($this->_x * $rhs->get_z()) + ($rhs->get_x() * $this->_z);
        $z = -($this->_y * $rhs->get_x()) + ($rhs->get_y() * $this->_x);
        $vertex = new Vertex(array("x" => $x,"y" => $y,"z" => $z));
        return new Vector(array("dest" => $vertex));
    }
}