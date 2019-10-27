<?php
class Render
{
    const VERTEX = 1;
	const EDGE = 2;
    const RASTERIZE = 3;
    static $verbose = false;
    public $widht;
    public $height;
    public $filename;
    

    function __construct(array $arr)
    {
        if(!isset($arr["widht"]) || !isset($arr["height"]) || !isset($arr["filename"]))
            __destruct();
        
    }
    function renderVertex(Vertex $screenVertex)
    {

    }

    function renderTriangle(Triangle $triangle, $mode)
    {

    }
    function develop()
    {
        
    }
}