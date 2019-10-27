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
echo(json_encode(get_csv("list.csv", ";")));