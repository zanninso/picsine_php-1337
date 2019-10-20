<?php
include_once "../core/db.php";
include_once "../core/helper.php";
session_start();

if($_SESSION["login"] &&  $_SESSION["role"])
{
    if($_SESSION["role"] == 0)
        header("Location: admin");
    else 
        header("Location: home");
}

if(fieldsIsSet(["login","passwd"]))
{
    $login = $_POST["login"];
    $pass = hash("whirlpool", $_POST["passwd"]);
    $data = get_data("select * from users where username = '?' and passwrd = '?'",array($login, $pass));
    if($data["num_rows"] > 0);
    {
        $_SESSION["login"] = $login;
        $_SESSION["role"] = $data["rows"][0]["role"];
        if($_SESSION["role"] == 0)
            header("Location: admin");
        else 
            header("Location: home");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../style/login.css" />
    <style>

    </style>
</head>

<body>
    <div id="login">
        <span class="form_title">Login to continue</span>
        <form id="form" method="post" name="form_login">
            <div id="input">
                <div id="font_form">User</div>
                <input class="text_box" name="login" type="text">
            </div>
            <div id="input">
                <div id="font_form">Password</div>
                <input class="text_box" name="passwd" type="password">
            </div>
            <input id="login_button" name="button" type="submit" value="Login">
        </form>
        <div id="sign_up">Not a member? <a href=#> Sign up now </a></div>
    </div>
</body>
</html>