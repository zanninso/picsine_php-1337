<?php
include_once "../core/db.php";
include_once "../core/helper.php";

if(fieldsIsSet(["username","password","first_name","last_name","mail","phone","adresse"]))
{
    $validatio_error;
    if(!($validatio_error = validateFields("users")))
    {
        $pass = hash("whirlpool", $_POST["password"]);
        $param = [$_POST["username"], $pass, $_POST["mail"], $_POST["phone"], $_POST["adresse"], $_POST["first_name"], $_POST["last_name"]];
        if(1 === execut_query("insert into users (username, passwrd, email, phone, adresse, first_name, last_name) values('?','?','?','?','?','?','?')", $param))
            header("Location: login.php");
        else 
           echo "<script> alert('error');</script>";
    }
}
else 
echo "<script> alert('some required fields are empty');</script>";

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../style/sign_up.css" />
    <style>

    </style>
</head>

<body>
    <div id="login">
        <span class="form_title">Create account</span>
        <form id="form" method="post" name="form_login">
            <div id="input">
                <div id="font_form">First_name</div>
                <input class="text_box" name="first_name" type="text">
            </div>
            <div id="input">
                <div id="font_form">Last_name</div>
                <input class="text_box" name="last_name" type="text">
            </div>
            <div id="input">
                <div id="font_form">Login</div>
                <input class="text_box" name="username" type="text">
            </div>
            <div id="input">
                <div id="font_form">Phone</div>
                <input class="text_box" name="phone" type="text">
            </div>
            <div id="input">
                <div id="font_form">Adress</div>
                <input class="text_box" name="adresse" type="text">
            </div>
            <div id="input">
                <div id="font_form">E-mail</div>
                <input class="text_box" name="mail" type="text">
            </div>
            <div id="input">
                <div id="font_form">Password</div>
                <input class="text_box" name="password" type="password">
            </div>
            <input id="sign_up_button" name="button" type="submit" value="Sign up">
            <div style="color:red">
                <?php
                if(isset($validatio_error) && is_array($validatio_error))
                    foreach($validatio_error as $key=> $value)
                        echo "<p><b>$key</b>: $value</p>";
                ?>
            </div>
        </form>
        <div id="sign_up">Already a member? <a href=#> Sign in </a></div>
        
    </div>
</body>

</html>