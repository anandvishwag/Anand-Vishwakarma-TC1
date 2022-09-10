<?php

class users
{
    // table fields
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $street;
    public $zip_code;
    public $city;
    function __construct()
    {
        $id=0;$first_name=$last_name=$email=$street=$zip_code=$city="";
    }
}

?>