<?php
require_once 'Matrix.class.php';

class Camera
{
    public static $verbose = false;
    private $_origin;
    private $_orientation;
    private $_width;
    private $_height;
    private $_ratio;
    private $_fov;
    private $_near;
    private $_far;
    private $T;
    private $tT;
    private $R;
    private $tR;
    private $tm;
    private $P;

    public function __construct(array $array)
    {
        $this->_origin = $array['origin'];
        $this->_orientation = $array['orientation'];
        $this->_width = $array['width'];
        $this->_height = $array['height'];
        $this->_ratio = $array['ratio'];
        $this->_fov = $array['fov'];
        $this->_near = $array['near'];
        $this->_far = $array['far'];
        $this->watchVertex($this->_origin);
        if (self::$verbose)
            print("Camera instance constructed" . PHP_EOL);
    }
    public function __destruct()
    {
        if (self::$verbose) 
        {
            print("Camera instance destructed" . PHP_EOL);
        }

    }
    static public function doc()
    {
        echo file_get_contents("Camera.doc.txt"). PHP_EOL;
    }

    public function __toString()
    {
        $str = "Camera( ";
        $str .= "\n+ Origine: ";
        $str .= $this->_origin;
        $str .= "\n+ tT:\n";
        $str .= $this->tT;
        $str .= "+ tR:\n";
        $str .= $this->tR;
        $str .= "+ tR->mult( tT ):\n";
        $str .= $this->tm;
        $str .= "+ Proj:\n";
        $str .= $this->p;
        $str .= ")";
        return ($str);
    }

    private function watchVertex(Vertex $worldVertex)
    {
        $vtc = new Vector( array( 'dest' => $worldVertex, 'orig' =>new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0 )))) ;
        $oppv = $vtc->opposite();
        $this->T  = new Matrix( array( 'preset' => Matrix::TRANSLATION, 'vtc' => $vtc ) );
        $this->tT  = new Matrix( array( 'preset' => Matrix::TRANSLATION, 'vtc' => $oppv) );
        $this->tR = $this->_orientation->symetrie_matrice();
        $this->tm = $this->tR->mult($this->tT);
        $this->p = new Matrix( array( 'preset' => Matrix::PROJECTION, 
        'fov' => $this->_fov, 
        'ratio' => $this->_width / $this->_height, 
        'near' => $this->_near, 
        'far' => $this->_far ));
    }
}
