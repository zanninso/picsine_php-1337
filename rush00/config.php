<?php
$config["db"]= array("dbname"=> "VYiNtPp3ol","host"=>"remotemysql.com","user"=>"VYiNtPp3ol","pass"=>"rqHy9khBFA");
$config["table_prop"] = array(
    "users" => array(
                array("name"=> "first_name", "type"=>"string", "len"=>60),
                array("name"=> "last_name", "type"=>"string", "len"=>60),
                array("name"=> "password", "type"=>"password", "len"=>20),
                array("name"=> "mail", "type"=>"mail", "len"=>60),
                array("name"=> "username", "type"=>"string", "len"=>60),
                array("name"=> "phone", "type"=>"phone", "len"=>10)),
    "product" => array(
                array("name"=> "name", "type"=>"string", "len"=>60),
                array("prix"=> "prix", "type"=>"numeric", "len"=>20),
                array("name"=> "quantite", "type"=>"numeric", "len"=>20)),
    "orders" => array(array("name"=> "total_price", "type"=>"numeric", "len"=>20)),
    "categories" => array(array("name"=> "name", "type"=>"string", "len"=>60)),
);

?>