<?php
   include "../core/db.php";

   function add_user($arr)
   {
       if($arr)
       {
            $res = get_data("INSERT INTO users (first_name, last_name, username, passwrd, phone, adresse, email, role) VALUES('?', '?', '?', '?', '?', '?', '?', '?')", $arr);
            return $res;
        }
   }

   function read_user()
   {
        $res = get_data("SELECT * FROM users", []);
        return $res;
   }
?>