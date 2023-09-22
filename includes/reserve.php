<?php
session_start();

$con = Connect();

$id = $_SESSION['USER_ID'];
$permission = mysqli_query($con, "SELECT permission FROM adminLogin WHERE id = '$id'");
$row = mysqli_fetch_assoc($permission);
$permission_value = $row['permission'];


if (isset($_POST['submit'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $tables = $_POST['tables'];

    $sql = "INSERT INTO reservations(FirstName,LastName,date,time,guests,email,phone,tables) value ('$FirstName','$LastName','$date','$time','$guests','$email','$phone','$tables')";
    mysqli_query($con, $sql);

    $success = "Your reservation request is successfully sent!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delisio - Reserve a table</title>
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
                            <a class="nav-link active" href="./?p=reserve">Reserve a table</a>
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

    <div class="container reserve-hero text-white">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <h1 class="reserve-hero-h1 mb-3">Reservation</h1>
                <p class="text-white reserve-hero-text">If you are eager for an unforgettable fine dining experience, we are waiting for you in our restaurant!</p>
                <p class="text-white reserve-hero-text">When booking a table, please include any food allergies and also if you would like to celebrate a special occasion at Delisio.</p>
                <p class="text-white reserve-hero-text">Our tasting menu is available until 22:00. For reservations of more than 7 people, we can serve you a fixed menu, we will discuss this with you during the reservation.</p>
                <p class="text-white reserve-hero-text">We keep the reserved table for 15 minutes upon the given time, please let us know if you will be late.</p>
            </div>

            <?php if (isset($success)) { ?>
                <div class="alert alert-dismissible fade show" role="alert" data-color="success">
                    <i class="fas fa-check-circle me-3"></i><?php echo $success; ?>
                    <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

            <!-- Form wizrd -->
            <div>
                <!-- Steps -->
                <ul class="stepper" id="stepper-form" data-stepper-linear="true">
                    <form method="post" class="needs-validation stepper-form">
                        <!-- First step -->
                        <li class="stepper-step stepper-active">
                            <div class="stepper-head">
                                <span class="stepper-head-icon">1</span>
                                <span class="stepper-head-text">Details</span>
                            </div>
                            <div class="stepper-content">
                                <div>
                                    <div class="form-outline">
                                        <input type="text" class="form-control text-white input-first" id="validationFirst" name="FirstName" required>
                                        <label for="validationFirst" class="form-label text-white">First Name</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-outline">
                                        <input type="text" class="form-control text-white input-last" id="validationLast" name="LastName" required>
                                        <label for="validationLast" class="form-label">Last Name</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-outline datepicker-disable-past">
                                        <input type="text" class="form-control text-white input-date" id="DatePicker" name="date" data-toggle="datepicker" required>
                                        <label for="DatePicker" class="form-label">Select a date (dd/mm/yyyy)</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-outline timepicker-inc" data-format24="true">
                                        <input type="text" class="form-control text-white input-time" id="TimePicker" name="time" data-toggle="timepicker" required>
                                        <label for="TimePicker" class="form-label text-white">Select the time</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-outline">
                                        <input type="tel" id="typeNumber" class="form-control text-white input-guests" name="guests" onkeypress="return checkNumber(event)" required />
                                        <label class="form-label" for="typeNumber">Number of guests</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="input-group form-outline">
                                        <input type="email" id="validationEmail" class="form-control text-white input-email" name="email" aria-describedby="inputGroupPrepend" required />
                                        <label for="validationEmail" class="form-label text-white">Email address</label>
                                        <div class="invalid-feedback">Please use a valid email address.</div>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-outline">
                                        <input type="tel" id="typePhone" class="form-control text-white" name="phone" onkeypress="return checkPhone(event)" />
                                        <label class="form-label" for="typePhone">Phone number (optional)</label>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <!-- First step -->

                        <!-- Second step -->
                        <li class="stepper-step">
                            <div class="stepper-head">
                                <span class="stepper-head-icon">2</span>
                                <span class="stepper-head-text">Select table</span>
                            </div>
                            <div class="stepper-content">

                                <div class="container align-items-center">
                                    <div class="row justify-content-center">
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-1" value="1" name="tables">
                                            <label for="table-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-2" value="2" name="tables">
                                            <label for="table-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-around">
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-3" value="3" name="tables">
                                            <label for="table-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-4" value="4" name="tables">
                                            <label for="table-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-5" value="5" name="tables">
                                            <label for="table-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-6" value="6" name="tables">
                                            <label for="table-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row justify-content-evenly">
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-7" value="7" name="tables">
                                            <label for="table-7">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <input class="table" type="checkbox" id="table-8" value="8" name="tables">
                                            <label for="table-8">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="55px" viewBox="0 0 100 55" version="1.1">
                                                    <g>
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 49.995625 5.995028 L 95.005469 5.995028 L 95.005469 38.503196 L 49.995625 38.503196 Z M 117.499375 5.995028 L 162.498203 5.995028 L 162.498203 38.503196 L 117.499375 38.503196 Z M 182.502578 5.995028 L 227.501406 5.995028 L 227.501406 38.503196 L 182.502578 38.503196 Z M 4.996797 96.00071 L 4.996797 50.997869 L 37.503906 50.997869 L 37.503906 96.00071 Z M 49.995625 116.003196 L 95.005469 116.003196 L 95.005469 148.500355 L 49.995625 148.500355 Z M 117.499375 116.003196 L 162.498203 116.003196 L 162.498203 148.500355 L 117.499375 148.500355 Z M 182.502578 116.003196 L 227.501406 116.003196 L 227.501406 148.500355 L 182.502578 148.500355 Z M 245.005234 96.00071 L 245.005234 50.997869 L 277.501328 50.997869 L 277.501328 96.00071 Z M 245.005234 96.00071 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 32.502812 25.997514 L 247.494766 25.997514 L 247.494766 125.998935 L 32.502812 125.998935 Z M 32.502812 25.997514 " transform="matrix(0.35461,0,0,0.354839,0.177305,0.177419)" />
                                                        <path style="fill-rule:evenodd;fill:#fff;fill-opacity:1;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke:#000;stroke-opacity:1;stroke-miterlimit:4;" d="M 53.002891 -0.00461648 L 91.998203 -0.00461648 C 93.661562 -" />
                                                    </g>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- Second step -->

                </ul>
                <!-- Steps -->

                <!-- Buttons -->
                <div class="row justify-content-around">
                    <div class="col-4">
                        <button class="btn submit-button" name="submit" type="submit" id="reserve-table" disabled>Reserve table</button>

                    </div>
                    <div class="col-4">
                        <input type="submit" name="select_table" value="Select table" id="select-table" class="btn submit-button">
                    </div>

                </div>
                </form>
                <!-- Buttons -->
            </div>

            <!-- Form wizrd -->
            <div class="col-lg-4"></div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row reserve-row">
            <div class="col-lg-3 reserve-img">
                <div class="reserve-1-img"></div>
            </div>
            <div class="col-lg-3 reserve-img">
                <div class="reserve-2-img"></div>
            </div>
            <div class="col-lg-3 reserve-img">
                <div class="reserve-3-img"></div>
            </div>
            <div class="col-lg-3 reserve-img">
                <div class="reserve-4-img"></div>
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
    <script src="../assets/js/validation.js"></script>
    <!-- MDB -->
    <script src="../assets/js/mdb.free.min.js"></script>
    <script src="../assets/js/mdb.free.min.js.map"></script>
    <script src="../assets/js/mdb.pro.min.js"></script>
    <script src="../assets/js/mdb.pro.min.js.map"></script>
    <script src="../assets/js/mdb.pro.js"></script>
    <script src="../assets/js/mdb.free.js"></script>

    <script>
        // initialize datepicker
        let today = new Date();
        const datepickerDisablePast = document.querySelector('.datepicker-disable-past');
        new mdb.Datepicker(datepickerDisablePast, {
            min: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 1),
        });

        // initialize timepicker with increment option
        const pickerInc = document.querySelector('.timepicker-inc');
        const timepickerInc = new mdb.Timepicker(pickerInc, {
            increment: true,
        });

        // initialize timepicker with format24 option
        const picker = document.querySelector('.timepicker-format');
        const tpFormat24 = new mdb.Timepicker(picker, {
            format24: true
        });
    </script>

    <script>
        let inputFirst = document.querySelector(".input-first");
        let inputLast = document.querySelector(".input-last");
        let inputDate = document.querySelector(".input-date");
        let inputTime = document.querySelector(".input-time");
        let inputGuests = document.querySelector(".input-guests");
        let inputEmail = document.querySelector(".input-email");
        let submitButton = document.querySelector(".submit-button");

        inputFirst.addEventListener("input", checkInputs);
        inputLast.addEventListener("input", checkInputs);
        inputDate.addEventListener("input", checkInputs);
        inputTime.addEventListener("input", checkInputs);
        inputGuests.addEventListener("input", checkInputs);
        inputEmail.addEventListener("input", checkInputs);

        function checkInputs() {
            if (inputFirst.value !== "" && inputLast.value !== "" && inputDate.value !== "" && inputTime.value !== "" && inputGuests.value !== "" && inputEmail.value !== "") {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>
    <script>
        function checkNumber(event) {

            var aCode = event.which ? event.which : event.keyCode;

            if (aCode > 31 && (aCode < 48 || aCode > 57)) return false;

            return true;
        }
    </script>
    <script>
        function checkPhone(event) {

            var aCode = event.which ? event.which : event.keyCode;

            if (aCode > 31 && (aCode < 48 || aCode > 57) && aCode > 43) return false;

            return true;
        }
    </script>
    <script>
        const stepper = new mdb.Stepper(document.getElementById('stepper-form'));

        document.getElementById('select-table').addEventListener('click', () => {
            stepper.nextStep();
        });
    </script>
    <!-- <script>
        const tables = document.querySelectorAll('input[name="table"]');

        tables.forEach(table => {
            table.addEventListener('change', function() {
                tables.forEach(table => {
                    if (table !== this) {
                        table.checked = false;
                    }
                });
            });
        });
    </script> -->
</body>

</html>