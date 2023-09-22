<?php
$content = "./includes/main.php";

if (isset($_GET["p"])) {
  switch ($_GET["p"]) {
    case "about":
      $content = "./includes/about.php";
      break;
    case "menu":
      $content = "./includes/menu.php";
      break;
    case "wine":
      $content = "./includes/wine.php";
      break;
    case "reserve":
      $content = "./includes/reserve.php";
      break;
    case "gallery":
      $content = "./includes/gallery.php";
      break;
    case "contact":
      $content = "./includes/contact.php";
      break;
    case "login":
      $content = "./admin/login.php";
      break;
    case "adminLogin":
      $content = "./admin/adminLogin.php";
      break;
    case "adminPanel":
      $content = "./admin/adminPanel.php";
      break;
    case "adminLogout":
      $content = "./admin/adminLogout.php";
      break;
    case "changeMenu":
      $content = "./admin/changeMenu.php";
      break;
    case "changeWine":
      $content = "./admin/changeWine.php";
      break;
  }
}
