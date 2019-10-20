<?php
include_once "../config.php";
include_once "helper.php";

function get_data($query, $params = [])
{
    global $config;
    $host = $config["db"]["host"];
    $user = $config["db"]["user"];
    $pass = $config["db"]["pass"];
    $dbname =$config["db"]["dbname"];

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    foreach($params as $param)
    {
        $param = mysqli_real_escape_string($conn,  $param);
        $query = str_replace_first("'?'","'".$param."'",$query);
    }

    $res = mysqli_query($conn, $query);

    if($res instanceof mysqli_result)
    {
        $result["num_rows"] = mysqli_num_rows($res);
        if (mysqli_num_rows($res) > 0)
        {
            $rows = array();
            while($row = mysqli_fetch_assoc($res))
            array_push($rows,$row);
            $result["rows"] = $rows;
        }
        else
            $result["error"] = mysqli_error($conn);
    }
    mysqli_close($conn);
    return ($result);
}

function execut_query($query, $params = [])
{
    global $config;

    $servername = $config["db"]["host"];
    $username = $config["db"]["user"];
    $password = $config["db"]["pass"];
    $dbname =$config["db"]["dbname"];
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    foreach($params as $param)
    {
        $param = mysqli_real_escape_string($conn,  $param);
        $query = str_replace_first("'?'", "'".$param."'", $query);
    }
    $error  = mysqli_query($conn, $query) ? 1 : mysqli_error($conn);
    echo $query. "\n" . $error;

    mysqli_close($conn);
    return($error);
}