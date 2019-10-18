#!/usr/bin/php
<?php
// function loope()
// {

// }

// if($argc == 2)
// {
//     $text = file_get_contents($argv[1]);
//     $i = 0;
//     while($text[$i])
//     {
//         if(preg_match("/^< *a +href( .*)*>.*<\/ *a( .*)*>/", $text + $i))
//             echo $text[$i];
//         if($text[$i] != '<')
//             echo $text[$i];
//     }
// }

function DOMinnerHTML(DOMNode $element) 
{ 
    $innerHTML = array(); 
    $children  = $element->childNodes;
    if($children)
    {
        foreach ($children as $child) 
        { 
        array_push($innerHTML,$element->ownerDocument->saveHTML($child));
        }
    }
    return $innerHTML; 
}

function createNodesFromHTML($dom, $str) 
{
        $d = new DOMDocument();
        $d->loadHTML("<html>{$str}</html>");
        $child = $d->documentElement->firstChild;
        $dom->importNode($child,true);
        return $child;
}

if($argc == 2)
{
    $html = file_get_contents($argv[1]);
    $dom = new DOMDocument();
    $dom->loadHTML($html);

    $a = $dom->getElementsByTagName("a");
    echo $dom->getElementsByTagName("a")->item(1)->innerHTML."1111\n";
    foreach($a as $ancr)
    {
        $ue = array();
        foreach(DOMinnerHTML($ancr) as $e)
        {
            if(!preg_match("/^<.*>/",$e))
               $e = strtoupper($e);
           // echo htmlspecialchars_decode($e)."\n";
            $ancr->appendChild(createNodesFromHTML($dom, htmlspecialchars_decode($e, ENT_HTML401)));
           // $dom->createTextNode($ue);
        }
       
        print_r(DOMinnerHTML($ancr));
       echo "------------------------------------\n";
        foreach($ancr->getElementsByTagName("*") as $element){
            $ue = array();
           $innerHTML = DOMinnerHTML($element);
           foreach($innerHTML as $e)
            {
                if(!preg_match("/^<.*>/",$e))
                    $e = mb_strtoupper($e);
                array_push($ue, $e);
            }
           print_r($ue);
           echo "++++++++++++++++++++++++++++++++++++\n";
        }
    }
    $html = $dom->SaveHTML();
}