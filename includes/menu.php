<?php

session_start();

$con = Connect();

$id = $_SESSION['USER_ID'];
$permission = mysqli_query($con, "SELECT permission FROM adminLogin WHERE id = '$id'");
$row = mysqli_fetch_assoc($permission);
$permission_value = $row['permission'];

$result1 = Menu1();
$menu_price1 = mysqli_fetch_array(Menu1_price());

$result2 = Menu2();
$menu_price2 = mysqli_fetch_array(Menu2_price());

$result3 = Menu3();
$menu_price3 = mysqli_fetch_array(Menu3_price());

$result4 = Starters();
$row4 = mysqli_fetch_array(Starters());

$result5 = Main();
$row5 = mysqli_fetch_array(Main());

$result6 = Sauces();
$row6 = mysqli_fetch_array(Sauces());

$result7 = Desserts();
$row7 = mysqli_fetch_array(Desserts());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delisio - Menu</title>
    <!-- FAVICON -->
    <link rel="icon" href="../assets/favicon/favicon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/bg.css" />
    <!-- MDB -->
    <link rel="stylesheet" href="../assets/css/mdb.free.min.css" />
    <link rel="stylesheet" href="../assets/css/mdb.pro.min.css" />
    <link rel="stylesheet" href="../assets/css/mdb.pro.min.css.map" />
    <link rel="stylesheet" href="../assets/css/mdb.pro.scss" />
    <link rel="stylesheet" href="../assets/css/mdb.free.scss" />
    <link rel="stylesheet" href="../assets/css/mdb.core.scss">
    <!-- MDB ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" >
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top rounded-4 navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Delisio</a>
                <button class="navbar-toggler hamburger-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger-icon"><span></span><span></span><span></span><span></span></div>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=about">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item active" href="./?p=menu">Menu</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./?p=wine">Wine</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=reserve">Reserve a table</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=contact">Contact</a>
                        </li>
                    </ul>
                    <?php if ($permission_value >= 1) { ?>
            <ul class="navbar-nav ms-auto">
              <hr class="text-white">
              <li class="nav-item">
                <a class="nav-link" href="./?p=adminPanel">Admin panel</a>
              </li>
            </ul>
            <div class="d-flex align-items-center">
              <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow adminProfile" href="#" id="navbarDropdownMenuAvatar" role="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdownMenuAvatar">
                  <li>
                    <a class="dropdown-item" href="./?p=adminLogout">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          <?php } ?>
                </div>
            </div>
        </nav>
    </div>

    <div class="container text-white carte-hero">
        <div class="row carte-row">
            <div class="col-lg-6">
                <h3 class="carte-header">Euphoria Degustation Menu</h3>
                <?php while ($row_loop1 = mysqli_fetch_array($result1)) { ?>
                    <h5 class="carte-hero-text"><?php echo $row_loop1["food"]; ?></h5>
                    <p class="carte-hero-text"><?php echo $row_loop1["ingredients"]; ?></p>
                <?php } ?>
                <p class="carte-hero-text carte-price"><?php echo number_format($menu_price1["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                <p class="carte-hero-text carte-price">Wine pairing: <?php echo number_format($menu_price1["wine_price"], 0, ".", " ") . " HUF / Person"; ?></p>
            </div>
            <div class="col-lg-6">
                <div class="carte-1-img"></div>
            </div>
        </div>
        <div class="row carte-row">
            <div class="col-lg-6">
                <div class="carte-2-img"></div>
            </div>
            <div class="col-lg-6">
                <h3 class="carte-header">Ecstasy Degustation Menu</h3>
                <?php while ($row_loop2 = mysqli_fetch_array($result2)) { ?>
                    <h5 class="carte-hero-text"><?php echo $row_loop2["food"]; ?></h5>
                    <p class="carte-hero-text"><?php echo $row_loop2["ingredients"]; ?></p>
                <?php } ?>
                <p class="carte-hero-text carte-price"><?php echo number_format($menu_price2["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                <p class="carte-hero-text carte-price">Wine pairing: <?php echo number_format($menu_price2["wine_price"], 0, ".", " ") . " HUF / Person"; ?></p>
            </div>
        </div>
        <div class="row carte-row">
            <div class="col-lg-6">
                <h3 class="carte-header">Endorfin Degustation Menu</h3>
                <?php while ($row_loop3 = mysqli_fetch_array($result3)) { ?>
                    <h5 class="carte-hero-text"><?php echo $row_loop3["food"]; ?></h5>
                    <p class="carte-hero-text"><?php echo $row_loop3["ingredients"]; ?></p>
                <?php } ?>
                <p class="carte-hero-text carte-price"><?php echo number_format($menu_price3["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                <p class="carte-hero-text carte-price">Wine pairing: <?php echo number_format($menu_price3["wine_price"], 0, ".", " ") . " HUF / Person"; ?></p>
            </div>
            <div class="col-lg-6">
                <div class="carte-3-img"></div>
            </div>
        </div>
        <div class="row carte-row">
            <div class="col-lg-6">
                <div class="carte-4-img"></div>
            </div>
            <div class="col-lg-6">
                <h3 class="carte-header">Starters</h3>
                <?php while ($row_loop4 = mysqli_fetch_array($result4)) { ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-inline-block">
                            <h5 class="carte-hero-text float-start"><?php echo $row_loop4["food"]; ?></h5>
                        </div>
                        <div class="d-inline-block">
                            <h5 class="carte-hero-text float-end"><?php echo number_format($row_loop4["price"], 0, ".", " ") . " HUF"; ?></h5>
                        </div>
                    </div>
                    <p class="carte-hero-text"><?php echo $row_loop4["ingredients"]; ?></p>
                <?php } ?>
            </div>
        </div>
        <div class="row carte-row">
            <div class="col-lg-6">
                <h3 class="carte-header">Main courses</h3>
                <?php while ($row_loop5 = mysqli_fetch_array($result5)) { ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-inline-block">
                            <h5 class="carte-hero-text float-start"><?php echo $row_loop5["food"]; ?></h5>
                        </div>
                        <div class="d-inline-block">
                            <h5 class="carte-hero-text float-end"><?php echo number_format($row_loop5["price"], 0, ".", " ") . " HUF"; ?></h5>
                        </div>
                    </div>
                    <p class="carte-hero-text"><?php echo $row_loop5["ingredients"]; ?></p>
                <?php } ?>
                <h3 class="carte-header">Sauces</h3>
                <h5 class="carte-hero-text"><?php echo $row6["sauces"]; ?></h5>
            </div>
            <div class="col-lg-6">
                <div class="carte-5-img"></div>
            </div>
        </div>
        <div class="row carte-row">
            <div class="col-lg-6">
                <div class="carte-6-img"></div>
            </div>
            <div class="col-lg-6">
                <h3 class="carte-header">Desserts</h3>
                <?php while ($row_loop7 = mysqli_fetch_array($result7)) { ?>
                    <div class="d-flex justify-content-between">
                        <div class="d-inline-block">
                            <h5 class="carte-hero-text float-start"><?php echo $row_loop7["food"]; ?></h5>
                        </div>
                        <div class="d-inline-block">
                            <h5 class="carte-hero-text float-end"><?php echo number_format($row_loop7["price"], 0, ".", " ") . " HUF"; ?></h5>
                        </div>
                    </div>
                    <p class="carte-hero-text"><?php echo $row_loop7["ingredients"]; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col-md-6 text-white text-center">
                    <p>All rights reserved. Copyright &copy; <script src="../assets/js/copyright.js"></script>
                    </p>
                </div>
                <div class="col-md-6 text-white text-center">
                    <a href="tel:+36123456789" class="text-white">+36 12 345 6789</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="../assets/js/hamburger.js"></script>
    <script src="../assets/js/app.js"></script>
    <!-- MDB -->
    <script src="../assets/js/mdb.free.min.js"></script>
    <script src="../assets/js/mdb.free.min.js.map"></script>
    <script src="../assets/js/mdb.pro.min.js"></script>
    <script src="../assets/js/mdb.pro.min.js.map"></script>
    <script src="../assets/js/mdb.pro.js"></script>
    <script src="../assets/js/mdb.free.js"></script>
</body>

</html>