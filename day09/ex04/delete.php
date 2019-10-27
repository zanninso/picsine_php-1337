<?php

header('Content-type: application/json');

function get_csv($fileName, $delimiter)
{
    $data = [];
    if(file_exists($fileName) && ($content = file_get_contents($fileName)))
    {
        $content = array_filter(explode("\n", $content));
        $keys = explode($delimiter,$content[0]);
        array_shift($content);
        foreach($content as $line)
        {
            $line = explode($delimiter,$line);
            $item = [];
            for($i = 0 ; $i < sizeof($line) ; $i++)
                $item[$keys[$i]] = $line[$i];
            $data[] = $item;
		}
        return ($data);
    }
    return NULL;
}

function put_csv($fileName, $lines, $keys, $delimiter)
{
	$keys = implode($delimiter,$keys);
	foreach($lines as &$line)
		$line = implode($delimiter,$line);
	$lines = trim($keys. "\n". implode("\n",$lines));
	file_put_contents(__DIR__.'/'.$fileName,$lines);
}

if((isset($_POST["id"])))
{
    if(is_array($lines = get_csv("list.csv",";")) && !empty($lines))
    {
        foreach($lines as $key => $line)
        {
			if($line["id"] == $_POST["id"])
			{
				unset($lines[$key]);
				print_r($data);
				put_csv("list.csv",$lines,["id","value"],";");
				return;
			}
        }
    }
}