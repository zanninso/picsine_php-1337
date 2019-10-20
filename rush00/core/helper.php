<?php
//------------------------------------------------------------------------------
function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        return substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}


//----------------------------fields validation --------------------------------
function fieldsIsSet($fields, $method = "post")
{
    $f = ($method == "post" ? $_POST : $_GET);
    if(is_array($fields) and $method == "post")
    {
        foreach($fields as $field)
        {
            if(!isset($f[$field]) || $f[$field] === "")
            return(FALSE);
            $f[$field] = htmlspecialchars($f[$field]);
        }
    }
    return(TRUE);
}

function isMail($mail)
{
    preg_match("/^.{3,20}@.{2,20}\..{2,6}$/", $mail);
}

function isPhone($phone)
{
    preg_match("/^06\d{8}$/", $mail);
}

function isValidPassword($password)
{
    $len = strlen($password);
    if(sizeof($len > 20 || $len < 8 || !preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password)))
        return(0);
    return(1);
}

function validateFields($table,$fields = NULL,$mothod = "post")
{
    global $config;
    $f = ($method == "post" ? $_POST : $_GET);
    $error = array();
    if(is_array($fields))
    {
        foreach($fields as $field)
        {
           $fl =  $config["table_prop"][$table][$field];
           if(mb_strlen($f[$fl["name"]],'utf8') > $fl["len"])
              {  
                  $error[$field] = "lenght of ".$field." must be less than ".($fl["len"] + 1);
                  continue;
              }
            switch($fl["type"])
            {
                case "mail":
                    if(!isMail($f[$field]))
                        $error[$field] = "incorrect mail format";
                break;
                case "phone":
                    if(!isPhone($f[$field]))
                        $error[$field] = "incorrect phone number";
                break;
                case "numeric":
                    if(!is_numeric($f[$field]))
                        $error[$field] = "not a number";
                break;
                case "password":
                    if(!isValidPassword($f[$field]))
                        $error[$field] = "password must be 8 to 20 character and contain a-zA-z1-9";
                break;
            }
        }
    }
    else 
    {
        foreach($config["table_prop"][$table] as $field)
        {
           if(mb_strlen($f[$field["name"]],'utf8') > $field["len"])
              {  
                  $error[$field["name"]] = "lenght of ".$field["name"]." must be less than ".($field["len"] + 1);
                  continue;
              }
            switch($field["type"])
            {
                case "mail":
                    if(!isMail($f[$field["name"]]))
                        $error[$field["name"]] = "incorrect mail format";
                break;
                case "phone":
                    if(!isPhone($f[$field["name"]]))
                        $error[$field["name"]] = "incorrect phone number";
                break;
                case "numeric":
                    if(!is_numeric($f[$field["name"]]))
                        $error[$field["name"]] = "not a number";
                break;
                case "password":
                    if(!isValidPassword($f[$field["name"]]))
                        $error[$field["name"]] = "password must be 8 to 20 character and contain a-zA-z1-9";
                break;
            }
        }
    }
    return($error);
}

//------------------------------------------------------------------------------
