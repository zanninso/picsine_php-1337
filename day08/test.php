<?php


class Employee {
    public $name = '';
    public $age  = '';
    public $role = '';
    function myname()
    {
        echo "hhh";
    }
}

    $obj = new Employee();
    $obj->name = 'Alex';
    $obj->age  = 24;
    $obj->role = 'PHP Developer';
    
    $json = json_encode($obj);

    var_dump(json_decode($json));
?>