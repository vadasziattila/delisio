<?php
function Connect()
{
    $server = "localhost";
    $user = "delisioh_delisio";
    $pass = "";
    $db = "delisioh_szakdolgozat";

    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) {
        die("Cannot connect to the database");
    }
    mysqli_set_charset($con, "utf8");
    return $con;
}
