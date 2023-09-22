<?php

session_start();

$con = Connect();

$id = $_SESSION['USER_ID'];
$permission = mysqli_query($con, "SELECT permission FROM adminLogin WHERE id = '$id'");
$row = mysqli_fetch_assoc($permission);
$permission_value = $row['permission'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delisio - About Us</title>
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
              <a class="nav-link active" href="./?p=about">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                Menu
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="./?p=menu">Menu</a>
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

  <div class="container about-hero text-white">
    <div class="row mb-3">
      <div class="col-lg-4 links">
        <h1>Fine dining experience in the heart of Budapest</h1>
        <p>
          In restaurant Delisio, the unforgettable taste experience meets
          the professional, yet friendly service. In our restaurant, we offer
          a Fine Dining experience, but not within the usual framework.
        </p>
        <p>
          For us, hospitality is not just a job, but a passion. Our goal is to
          put our restaurant on the map of Hungarian gastronomy. Every day, we
          offer special, often unexpected flavor combinations in a cozy, yet
          casual environment. We wish meals to be not only a necessity, but
          also an experience, so we keep this in mind when it comes to
          flavors, serving and service.
        </p>
        <p>
          In addition to our à la carte dishes, we offer three types of
          tasting menus, so if you want a full Delisio experience, be sure
          to choose one of them. In addition to more than a hundred types of
          wine, our beverage selection also includes signature cocktails and
          premium spirits.
        </p>
        <div><a class="link" href="./?p=menu">View menu</a></div>
      </div>
      <div class="col-lg-4">
        <div class="about-1-img"></div>
      </div>
      <div class="col-lg-4">
        <div class="about-2-img"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="about-3-img"></div>
      </div>
      <div class="col-lg-4">
        <div class="about-4-img"></div>
      </div>
      <div class="col-lg-4">
        <h1>Our chef:</h1>
        <p>
          During his work, he’s looking for the most diverse and bold flavor
          combinations. “Here at Delisio, we like to explore and experiment. We
          want to give our guests an insight into the joy of this process when
          they visit us.”
        </p>
        <p>
          The secret of our tasting menus – created by our chef – is careful
          attention, precision and diversity.
        </p>
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