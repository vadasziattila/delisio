<?php
session_start();

$con = Connect();

$result = Reservations();

$id = $_SESSION['USER_ID'];
$permission = mysqli_query($con, "SELECT permission FROM adminLogin WHERE id = '$id'");
$row = mysqli_fetch_assoc($permission);
$permission_value = $row['permission'];

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (!isset($_SESSION['USER_ID'])) {
    header("location: ./?p=adminLogin");
    die();
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $email_query = mysqli_query($con, "SELECT email FROM reservations WHERE id = '$id'");
    $email_row = mysqli_fetch_assoc($email_query);
    $email = $email_row['email'];

    $date_query = mysqli_query($con, "SELECT time from reservations WHERE id = '$id'");
    $date_row = mysqli_fetch_assoc($date_query);
    $date = $date_row['time'];

    $time_query = mysqli_query($con, "SELECT time from reservations WHERE id = '$id'");
    $time_row = mysqli_fetch_assoc($time_query);
    $time = $time_row['time'];

    $delete = "DELETE FROM reservations WHERE id = '$id'";
    $delete_run = mysqli_query($con, $delete);

    $reservation_datetime = date('F j, Y', strtotime($date)) . ' ' . date('g:i A', strtotime($time));

    $to = $email;
    $subject = "Reservation Dennied";
    $message = "Dear Customer,\n\nYour reservation for $reservation_datetime has been dennied.\n\nWe apologize for the inconvenience caused.\n\nBest regards,\nThe Reservation Team";
    $headers = "From: no-reply@delisio.hu";

    if (mail($to, $subject, $message, $headers)) {
        $deny_sent = "Email sent!";
    }

    header("Refresh: 2; url= ./?p=adminPanel");
}

if (isset($_POST['approve'])) {
    $id = $_POST['id'];

    $email_query = mysqli_query($con, "SELECT email FROM reservations WHERE id = '$id'");
    $email_row = mysqli_fetch_assoc($email_query);
    $email = $email_row['email'];

    $date_query = mysqli_query($con, "SELECT time from reservations WHERE id = '$id'");
    $date_row = mysqli_fetch_assoc($date_query);
    $date = $date_row['time'];

    $time_query = mysqli_query($con, "SELECT time from reservations WHERE id = '$id'");
    $time_row = mysqli_fetch_assoc($time_query);
    $time = $time_row['time'];

    $approve = "UPDATE reservations SET status = 'approved' WHERE id = '$id'";
    $approve_run = mysqli_query($con, $approve);

    $current_date = date('F j, Y');

    $reservation_datetime = date('F j, Y', strtotime($date)) . ' ' . date('g:i A', strtotime($time));

    $to = $email;
    $subject = "Reservation Approved";
    $message = "Dear Customer,\n\nYour reservation for $reservation_datetime has been approved.\n\nThank you for choosing our service.\n\nBest regards,\nThe Reservation Team";
    $headers = "From: no-reply@delisio.hu";

    if (mail($to, $subject, $message, $headers)) {
        $approve_sent = "Email sent!";
    }

    header("Refresh: 2; url= ./?p=adminPanel");
}


$Approved = "<span class='badge badge-success rounded-pill d-inline'>Approved</span>";
$Await = "<span class='badge badge-warning rounded-pill d-inline'>Awaiting</span>";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delisio - Admin panel</title>
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
                <a class="navbar-brand" href="./?p=adminPanel">Admin Panel</a>
                <button class="navbar-toggler hamburger-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger-icon"><span></span><span></span><span></span><span></span></div>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if ($permission_value == 1) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                    Change menu
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="./?p=changeMenu">Menu</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./?p=changeWine">Wine</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <hr class="text-white">
                        <li class="nav-item">
                            <a class="nav-link" href="./?p=main">Main page</a>
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
                </div>
            </div>
        </nav>
    </div>



    <div class="container table-responsive reservations-hero">

        <?php if (isset($approve_sent)) { ?>
            <div class="alert alert-dismissible fade show" role="alert" data-color="success">
                <i class="fas fa-check-circle me-3"></i><?php echo $approve_sent; ?>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <?php if (isset($deny_sent)) { ?>
            <div class="alert alert-dismissible fade show" role="alert" data-color="danger">
                <i class="fas fa-times-circle me-3"></i><?php echo $deny_sent; ?>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>

        <table class="table table-dark table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Guests</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Table</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['FirstName'] . " ";
                            echo $row['LastName']; ?>
                        </td>
                        <td>
                            <?php echo $row['date'] . " ";
                            echo $row['time']; ?>
                        </td>
                        <td>
                            <?php echo $row['guests']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php if (empty($row['phone'])) {
                                echo "not given";
                            } else {
                                echo $row['phone'];
                            } ?>
                        </td>
                        <td>
                            <?php echo $row['tables']; ?>
                        </td>
                        <td>
                            <?php
                            $IsApprovedSuccess = mysqli_query($con, "SELECT status FROM reservations WHERE id = '$row[id]'");
                            $ApprovedSuccess = mysqli_fetch_assoc($IsApprovedSuccess);

                            if ($ApprovedSuccess['status'] == 'approved') {
                                echo $Approved;
                            } else {
                                echo $Await;
                            }
                            ?>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop<?php echo $row['id'] ?>">
                                Reservations
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="staticBackdrop<?php echo $row['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?php echo $row['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel<?php echo $row['id'] ?>">Reservations - Actions</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body row">
                                            <form action="" method="post" class="col-6 d-flex align-items-center justify-content-center">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="approve" class="btn btn-success" value="Approve">
                                            </form>
                                            <form action="" method="post" class="col-6 d-flex align-items-center justify-content-center">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="delete" class="btn btn-danger" value="Deny">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


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