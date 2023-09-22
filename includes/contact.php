<?php
session_start();

$con = Connect();

$id = $_SESSION['USER_ID'];
$permission = mysqli_query($con, "SELECT permission FROM adminLogin WHERE id = '$id'");
$row = mysqli_fetch_assoc($permission);
$permission_value = $row['permission'];


if (isset($_POST["submit"])) {
  $name    = (isset($_POST['name'])) ? $_POST['name'] : '';
  $email   = (isset($_POST['email'])) ? $_POST['email'] : '';
  $message = (isset($_POST['message'])) ? $_POST['message'] : '';
  $subject = (isset($_POST['subject'])) ? $_POST['subject'] : '';

  $content    = "From: $name \n\n Email: $email \n\n Message: $message";
  $recipient  = "info@delisio.hu";

  $mailheader = "From: $email\r\nContent-Type: text/html;charset=UTF-8\r\n";

  mail($recipient, $subject, $content, $mailheader) or die("Error!");
  $email_sent = "Email sent!";

  header("Refresh: 2; url= ./?p=contact");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delisio - Contact</title>
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
              <a class="nav-link active" href="./?p=contact">Contact</a>
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

  <div class="container text-white contact-hero">
    <div class="row">
      <div class="col-lg-6">
        <h3>Visit us!</h3>
        <p>
          Visit us with friends if you want to eat delicious food in a pleasant environment! If you have any questions or would like to book a table, please contact us at the contact details below.
        </p>
        <div class="d-inline p-2"><a class="link" href="./?p=menu">View menu</a></div>
        <div class="d-inline p-2"><a class="link" href="./?p=reserve">Reserve a table</a></div>
        <h4 class="mt-4">
          Hours
        </h4>
        <p class="mb-3">
          Temporary closed
        </p>
        <h4>
          Location
        </h4>
        <p class="mb-3">
          Not open yet
        </p>
        <h4>
          Email address
        </h4>
        <p>
          info@Delisio.hu
        </p>
      </div>
      <div class="col-lg-6">
      <?php if (isset($email_sent)) { ?>
                        <div class="alert alert-dismissible fade show" role="alert" data-color="success">
                            <i class="fas fa-check-circle me-3"></i><?php echo $email_sent; ?>
                            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

        <form id="contact-form" action="" method="POST" class="needs-validation" novalidate>
          <h3>Contact us!</h3>
          <p>
            You can send us any questions using the form below.
          </p>

          <!-- Name input -->
          <div class="form-outline mb-4">
            <input type="text" id="name" name="name" class="form-control text-white" required />
            <label class="form-label" for="name">Name</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control text-white" required />
            <label class="form-label" for="email">Email address</label>
          </div>

          <!-- Subject input -->
          <div class="form-outline mb-4">
            <input type="text" id="subject" name="subject" class="form-control text-white" required />
            <label class="form-label" for="subject">Subject</label>
          </div>

          <!-- Message input -->
          <div class="form-outline mb-4">
            <textarea class="form-control text-white" id="message" name="message" rows="4" required></textarea>
            <label class="form-label" for="message">Message</label>
          </div>

          <!-- Submit button -->
          <button id="submit-form" type="submit" name="submit" class="btn btn-primary btn-block mb-4">
            Send
          </button>
        </form>

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
  <script src="../assets/js/validation.js"></script>
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