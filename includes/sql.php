<?php

session_start();

function Menu1()
{
    $con = Connect();
    $sql = "SELECT * FROM menu1";
    $result1 = mysqli_query($con, $sql);
    return $result1;
    mysqli_close($con);
}

function Menu1_price()
{
    $con = Connect();
    $sql = "SELECT *, id as 'menu1_id' FROM menu_price WHERE `menu_name` LIKE 'menu1_price'";
    $menu_price1 = mysqli_query($con, $sql);
    return $menu_price1;
    mysqli_close($con);
}

function Menu2()
{
    $con = Connect();
    $sql = "SELECT * FROM menu2";
    $result2 = mysqli_query($con, $sql);
    return $result2;
    mysqli_close($con);
}

function Menu2_price()
{
    $con = Connect();
    $sql = "SELECT *, id as 'menu2_id' FROM menu_price WHERE `menu_name` LIKE 'menu2_price'";
    $menu_price2 = mysqli_query($con, $sql);
    return $menu_price2;
    mysqli_close($con);
}

function Menu3()
{
    $con = Connect();
    $sql = "SELECT * FROM menu3";
    $result3 = mysqli_query($con, $sql);
    return $result3;
    mysqli_close($con);
}

function Menu3_price()
{
    $con = Connect();
    $sql = "SELECT *, id as 'menu3_id' FROM menu_price WHERE `menu_name` LIKE 'menu3_price'";
    $menu_price3 = mysqli_query($con, $sql);
    return $menu_price3;
    mysqli_close($con);
}

function Starters()
{
    $con = Connect();
    $sql = "SELECT * FROM starters";
    $result4 = mysqli_query($con, $sql);
    return $result4;
    mysqli_close($con);
}

function Main()
{
    $con = Connect();
    $sql = "SELECT * FROM main";
    $result5 = mysqli_query($con, $sql);
    return $result5;
    mysqli_close($con);
}

function Sauces()
{
    $con = Connect();
    $sql = "SELECT * FROM sauces";
    $result6 = mysqli_query($con, $sql);
    return $result6;
    mysqli_close($con);
}

function Desserts()
{
    $con = Connect();
    $sql = "SELECT * FROM desserts";
    $result7 = mysqli_query($con, $sql);
    return $result7;
    mysqli_close($con);
}

function Red_Wines()
{
    $con = Connect();
    $sql = "SELECT * FROM red_wines";
    $red_wines = mysqli_query($con, $sql);
    return $red_wines;
    mysqli_close($con);
}

function White_Wines()
{
    $con = Connect();
    $sql = "SELECT * FROM white_wines";
    $white_wines = mysqli_query($con, $sql);
    return $white_wines;
    mysqli_close($con);
}

function Permission()
{
    $con = Connect();
    $sql = "SELECT permission FROM adminLogin";
    $permissionResult = mysqli_query($con, $sql);
    return $permissionResult;
    mysqli_close($con);
}

function Reservations()
{
    $con = Connect();
    $sql = "SELECT * from reservations";
    $reservations = mysqli_query($con, $sql);
    return $reservations;
    mysqli_close($con);
}
