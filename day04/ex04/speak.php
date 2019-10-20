<?php
session_start();
    if($_SESSION["loggued_on_user"] != "" && $_POST["msg"] != "")
    {
        if(!file_exists("../private"))
            mkdir("../private", 0777, true);
        $file = "";
        $fp = fopen("../private/chat", "a+");
        if(flock($fp, LOCK_EX))
        {
            $file = file_get_contents("../private/chat");
            $messages = ($file ? unserialize($file) : []);
            $messages[] = array("login"=> $_SESSION["loggued_on_user"], "time"=> time(), "msg"=> $_POST["msg"]);
            file_put_contents("../private/chat", serialize($messages));
            flock($fp,LOCK_UN);
            fclose($fp);
        }
    }
?>
<head>
    <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
    <form action="speak.php" method="post">
        <input name="msg" type="text" style="width : 70%">
        <input type="submit" value="envoyer" style="width : 25%">
    </form>
</body>
