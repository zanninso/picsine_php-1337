<?php
if ($_POST["submit"] == "OK")
{
    $error = 1;
    $salt = "as545ldn56DAD_ayh@564";
    $passwd = [];
    if(file_exists("private/passwd"))
    {
        $file = file_get_contents("private/passwd");
        $passwd = unserialize($file);
    }
    else
        mkdir("private", 0777, true);
    $i = 0;
    foreach($passwd as $pswd)
    {
        if($pswd["login"] ==  $_POST["login"] && $_POST["newpw"])
        {
            $error = 0;
            if($pswd["passwd"] == hash('whirlpool', $salt.$_POST["oldpw"]))
                $passwd[$i]["passwd"] = hash('whirlpool', $salt.$_POST["newpw"]);
            file_put_contents("private/passwd",serialize($passwd));
            break;
        }
        $i++;
    }
    if($error)
        echo "ERROR\n";
    print_r($passwd);
}
?>