<?php

require_once 'Vertex.class.php';
require_once 'Vector.class.php';

class Matrix
{
	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const TRANSLATION  = "TRANSLATION";
	const PROJECTION = "PROJECTION";
	const RX = "RX";
	const RY = "RY";
	const RZ = "RZ";
	private $_preset;
	private $_matrix =  [];
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_fov;
	private $_ration;
	private $_near;
	private $_far;
	static $verbose;

    function __construct(array $arr)
    {
		$this->_preset = $arr["preset"];
		
		if(!in_array($this->_preset,array("IDENTITY","SCALE","TRANSLATION","PROJECTION","RX","RY","RZ",)))
		{
			echo "fuck:$this->_preset\n";
			$this->__destruct();
		}
		call_user_func(array($this, "init".$this->_preset), $arr);
		
		if(self::$verbose)
		{
			$rot = array("RX" => "Ox ROTATION", "RY" => "Oy ROTATION", "RZ" => "Oz ROTATION");
			if(isset($rot[$this->_preset]))
				$this->_preset = $rot[$arr["preset"]];
			$preset = ($arr["preset"] === "IDENTITY" ? "" : "preset ");
			echo "Matrix $this->_preset {$preset}instance constructed\n";
		}
	}

	static function doc()
    {
        return (file_get_contents("Matrix.doc.txt")."\n");
    }

	function __destruct()
	{
		if(self::$verbose)
			echo "Matrix instance destructed\n";
	}

	function __toString()
	{
		$string = "M | vtcX | vtcY | vtcZ | vtxO\n";
		$string .= "-----------------------------\n";
		$string .= "x | ".$this->d2($this->_matrix["vctX"]->get_x())." | ".$this->d2($this->_matrix["vctY"]->get_x())." | ".$this->d2($this->_matrix["vctZ"]->get_x())." | ".$this->d2($this->_matrix["vrtx"]->get_x())."\n";
		$string .= "y | ".$this->d2($this->_matrix["vctX"]->get_y())." | ".$this->d2($this->_matrix["vctY"]->get_y())." | ".$this->d2($this->_matrix["vctZ"]->get_y())." | ".$this->d2($this->_matrix["vrtx"]->get_y())."\n";
		$string .= "z | ".$this->d2($this->_matrix["vctX"]->get_z())." | ".$this->d2($this->_matrix["vctY"]->get_z())." | ".$this->d2($this->_matrix["vctZ"]->get_z())." | ".$this->d2($this->_matrix["vrtx"]->get_z())."\n";
		$string .= "w | ".$this->d2($this->_matrix["vctX"]->get_w())." | ".$this->d2($this->_matrix["vctY"]->get_w())." | ".$this->d2($this->_matrix["vctZ"]->get_w())." | ".$this->d2($this->_matrix["vrtx"]->get_w())."";
		return($string);
	}

	private function initPROJECTION(array $array)
    {
        $vtxx = new Vertex( array( 'x' => 1 / (tan($array['fov'] * 0.5 * M_PI / 180) * $array['ratio']), 'y' => 0, 'z' => 0 ));
        $vtxy = new Vertex( array( 'x' => 0, 'y' =>  1 / tan($array['fov'] * 0.5 * M_PI / 180), 'z' => 0));
        $vtxz = new Vertex( array( 'x' => 0, 'y' => 0 , 'z' =>  ($array['near'] + $array['far']) / ($array['near'] - $array['far']), 'w' => 0));

        $this->_matrix["vctX"] = new Vector( array('dest' => $vtxx));
        $this->_matrix["vctY"] = new Vector( array('dest' => $vtxy));
        $this->_matrix["vctZ"] = new Vector( array('dest' => $vtxz));
        $this->_matrix["vrtx"] = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => (-2 * $array['far'] * $array['near']) / ($array['far'] - $array['near']), 'w' => 0 ));
        return ($this->_matrix);
    }

	function mult(Matrix $rhs)
	{
		$v = self::$verbose;
		self::$verbose = false;
		$new_mat = new Matrix(array("preset" => Matrix::IDENTITY));
		$new_mat->_matrix["vctX"] = $this->multi_mat($this->_matrix, $rhs->_matrix["vctX"]);
		$new_mat->_matrix["vctY"] = $this->multi_mat($this->_matrix, $rhs->_matrix["vctY"]);
		$new_mat->_matrix["vctZ"] = $this->multi_mat($this->_matrix, $rhs->_matrix["vctZ"]);
		$new_mat->_matrix["vrtx"] = $this->multi_mat($this->_matrix, $rhs->_matrix["vrtx"], 1);

		self::$verbose = $v;
		return ($new_mat);
	}

	function transformVertex(Vertex $vtx)
	{
		$orig  = $this->newVertex(0, 0, 0, 0);
		$vector = new Vector(array ("dest" => $vtx,"orig"=>$orig));
		return ($this->multi_mat($this->_matrix, $vector, 1));
	}

	public function initIDENTITY($arr, $scale = 1)
	{	
		$this->_matrix["vctX"] = $this->newVector(1 * $scale, 0, 0);
		$this->_matrix["vctY"] = $this->newVector(0, 1 * $scale, 0);
		$this->_matrix["vctZ"] = $this->newVector( 0, 0, 1 * $scale);
		$this->_matrix["vrtx"] = $this->newVertex(0, 0, 0);
	}

	function initSCALE($arr)
	{
		$this->_scale = $arr["scale"];
		$this->initIDENTITY($arr, $this->_scale);
	}

	function initTRANSLATION($arr)
	{
		$this->_vtc = $arr["vtc"];
		$this->initIDENTITY($arr);
		$this->_matrix["vrtx"] = $this->newVertex($this->_vtc->get_x(), $this->_vtc->get_y(), $this->_vtc->get_z());
	}

	function initRX(array $arr)
	{
		$angle = $arr["angle"];
		$this->_matrix["vctX"] = $this->newVector(1, 0, 0);
		$this->_matrix["vctY"] = $this->newVector(0, cos($angle), sin($angle));
		$this->_matrix["vctZ"] = $this->newVector(0, -sin($angle), cos($angle));
		$this->_matrix["vrtx"] = $this->newVertex(0, 0, 0);
	}

	function initRY(array $arr)
	{
		$angle = $arr["angle"];
		$this->_matrix["vctX"] = $this->newVector(cos($angle), 0, -sin($angle));
		$this->_matrix["vctY"] = $this->newVector(0, 1, 0);
		$this->_matrix["vctZ"] = $this->newVector(sin($angle), 0, cos($angle));
		$this->_matrix["vrtx"] = $this->newVertex(0, 0, 0);
	}

	function initRZ(array $arr)
	{
		$angle = $arr["angle"];
		$this->_matrix["vctX"] = $this->newVector(cos($angle), sin($angle), 0);
		$this->_matrix["vctY"] = $this->newVector(-sin($angle), cos($angle), 0);
		$this->_matrix["vctZ"] = $this->newVector(0, 0, 1);
		$this->_matrix["vrtx"] = $this->newVertex(0, 0, 0);
	}

	private function newVector($x, $y, $z, $w = 1)
	{
		$vrtx = new Vertex(array("x" => $x,"y" => $y,"z" => $z, "w"=> $w));
		return (new Vector(array("dest" => $vrtx)));
	}
	private function newVertex($x, $y, $z, $w = 1)
	{
		return (new Vertex(array("x" => $x,"y" => $y,"z" => $z, "w"=> $w)));
	}

	private function d2($v)
	{
		return (number_format($v, 2, '.', ''));
	}

	private function multi_mat($m, $vct, $vrtx = 0)
	{
		$vx = $vct->get_x();$vy = $vct->get_y();$vz = $vct->get_z();$vw = $vct->get_w();
		$w = 1;
		$x = $m["vctX"]->get_x() * $vx + $m["vctY"]->get_x() * $vy + $m["vctZ"]->get_x() * $vz +$m["vrtx"]->get_x() * $vw;
		$y = $m["vctX"]->get_y() * $vx + $m["vctY"]->get_y() * $vy + $m["vctZ"]->get_y() * $vz +$m["vrtx"]->get_y() * $vw;
		$z = $m["vctX"]->get_z() * $vx + $m["vctY"]->get_z() * $vy + $m["vctZ"]->get_z() * $vz +$m["vrtx"]->get_z() * $vw;
		//$w = $m["vctX"]->get_w() * $vx + $m["vctY"]->get_w() * $vy + $m["vctZ"]->get_w() * $vz +$m["vrtx"]->get_w() * $vw;
		return($vrtx ? $this->newVertex($x, $y, $z, $w) : $this->newVector($x, $y, $z, $w));
	}

	public function symetrie_matrice()
    {
        $new_matrix = new Matrix(array("preset" => Matrix::IDENTITY));
        $vrtx = new Vertex(array ("x" => $this->_matrix['vctX']->get_x(), "y" => $this->_matrix['vctY']->get_x(), "z" => $this->_matrix['vctZ']->get_x(),"w" => $this->_matrix['vrtx']->get_x() + 1));
        $new_matrix->_matrix["vctX"] = new Vector(array('dest' => $vrtx));
        $vrtx = new Vertex(array ("x" => $this->_matrix['vctX']->get_y(), "y" => $this->_matrix['vctY']->get_y(), "z" => $this->_matrix['vctZ']->get_y(),"w" => $this->_matrix['vrtx']->get_y() + 1));
        $new_matrix->_matrix["vctY"] =  new Vector(array('dest' => $vrtx));
        $vrtx = new Vertex(array ("x" => $this->_matrix['vctX']->get_z(), "y" => $this->_matrix['vctY']->get_z(), "z" => $this->_matrix['vctZ']->get_z(),"w" => $this->_matrix['vrtx']->get_z() + 1));
        $new_matrix->_matrix["vctZ"] =  new Vector(array('dest' => $vrtx));
        $vrtx = new Vertex(array ("x" => $this->_matrix['vctX']->get_w(), "y" => $this->_matrix['vctY']->get_w(), "z" => $this->_matrix['vctZ']->get_w(),"w" => $this->_matrix['vrtx']->get_w() + 1));
        $new_matrix->_matrix["vtx0"] =  new Vector(array('dest' => $vrtx));
        return ($new_matrix);
    }
}