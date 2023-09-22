<?php
session_start();



$con = Connect();

$id = $_SESSION['USER_ID'];
$permission = mysqli_query($con, "SELECT permission FROM adminLogin WHERE id = '$id'");
$row = mysqli_fetch_assoc($permission);
$permission_value = $row['permission'];

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (!isset($_SESSION['USER_ID'])) {
    header("Refresh: 1; url = ./?p=adminLogin");
    die();
}

$red_wines = Red_Wines();
$white_wines = White_Wines();

if (isset($_POST['changeRedWine'])) {
    $red_wine_id = $_POST['id'];

    $red_wine_name = mysqli_real_escape_string($con, $_POST['Red_wine_name']);
    $red_wine_vintage = mysqli_real_escape_string($con, $_POST['Red_wine_vintage']);
    $red_wine_country = mysqli_real_escape_string($con, $_POST['Red_wine_country']);
    $red_wine_price = mysqli_real_escape_string($con, $_POST['Red_wine_price']);

    if (!empty($red_wine_name)) {
        mysqli_query($con, "UPDATE red_wines SET name = '$red_wine_name' WHERE id = '$red_wine_id'");
    }
    if (!empty($red_wine_vintage)) {
        mysqli_query($con, "UPDATE red_wines SET vintage = '$red_wine_vintage' WHERE id = '$red_wine_id'");
    }
    if (!empty($red_wine_country)) {
        mysqli_query($con, "UPDATE red_wines SET country = '$red_wine_country' WHERE id = '$red_wine_id'");
    }
    if (!empty($red_wine_price)) {
        mysqli_query($con, "UPDATE red_wines SET price = '$red_wine_price' WHERE id = '$red_wine_id'");
    }

    $success = "The wine menu is successfully updated";

    header("Refresh: 2; url= ./?p=changeWine");
}

if (isset($_POST['changeWhiteWine'])) {
    $white_wine_id = $_POST['id'];

    $white_wine_name = mysqli_real_escape_string($con, $_POST['White_wine_name']);
    $white_wine_vintage = mysqli_real_escape_string($con, $_POST['White_wine_vintage']);
    $white_wine_country = mysqli_real_escape_string($con, $_POST['White_wine_country']);
    $white_wine_price = mysqli_real_escape_string($con, $_POST['White_wine_price']);

    if (!empty($white_wine_name)) {
        mysqli_query($con, "UPDATE white_wines SET name = '$white_wine_name' WHERE id = '$white_wine_id'");
    }
    if (!empty($white_wine_vintage)) {
        mysqli_query($con, "UPDATE white_wines SET vintage = '$white_wine_vintage' WHERE id = '$white_wine_id'");
    }
    if (!empty($white_wine_country)) {
        mysqli_query($con, "UPDATE white_wines SET country = '$white_wine_country' WHERE id = '$white_wine_id'");
    }
    if (!empty($white_wine_price)) {
        mysqli_query($con, "UPDATE white_wines SET price = '$white_wine_price' WHERE id = '$white_wine_id'");
    }

    $success = "The wine menu is successfully updated";

    header("Refresh: 2; url= ./?p=changeWine");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Delisio - Admin panel</title>
    <!-- FAVICON -->
    <link rel="icon" href="../assets/favicon/favicon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css" >
    <link rel="stylesheet" href="../assets/css/bg.css" >
    <!-- MDB -->
    <link rel="stylesheet" href="../assets/css/mdb.free.min.css" >
    <link rel="stylesheet" href="../assets/css/mdb.pro.min.css" >
    <link rel="stylesheet" href="../assets/css/mdb.pro.min.css.map" >
    <link rel="stylesheet" href="../assets/css/mdb.pro.scss" >
    <link rel="stylesheet" href="../assets/css/mdb.free.scss" >
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
                                <a class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                    Change menu
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="./?p=changeMenu">Menu</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item active" href="./?p=changeWine">Wine</a>
                                    </li>
                                </ul>
                            </li>
                        <?php } else {
                            header("Location: ./?p=adminPanel");
                        } ?>

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


    <div class="container table-responsive changeMenu-hero">

        <?php if (isset($success)) { ?>
            <div class="alert alert-dismissible fade show" role="alert" data-color="success">
                <i class="fas fa-check-circle me-3"></i><?php echo $success; ?>
                <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>


        <table class="table table-dark table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>Red Wines</th>
                    <th>Wine name</th>
                    <th>Vintage</th>
                    <th>Country</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row1 = mysqli_fetch_array($red_wines)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row1["name"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row1["vintage"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row1["country"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($row1["price"], 0, ".", " ") . " HUF"; ?></p>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Red_Wine<?php echo $row1['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Red_Wine<?php echo $row1['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Red_Wine_Label<?php echo $row1['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Red_wine_Label<?php echo $row1['id'] ?>">Red Wine - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">
                                                <div class="form-outline">
                                                    <input type="text" id="wine" name="Red_wine_name" class="form-control" />
                                                    <label class="form-label" for="wine">Wine Name</label>
                                                </div>



                                                <div class="form-outline">
                                                    <input type="text" id="vintage" name="Red_wine_vintage" class="form-control" />
                                                    <label class="form-label" for="vintage">Vintage</label>
                                                </div>


                                                <div class="form-outline">
                                                    <input type="text" id="country" name="Red_wine_country" class="form-control" />
                                                    <label class="form-label" for="country">Country</label>
                                                </div>


                                                <div class="form-outline">
                                                    <input type="text" id="price" name="Red_wine_price" class="form-control" />
                                                    <label class="form-label" for="price">Price (only numbers)</label>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
                                                    <input type="submit" name="changeRedWine" class="btn btn-primary" value="Save changes">
                                                </div>

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
        <table class="table table-dark table-striped align-middle mb-0 mt-5">
            <thead>
                <tr>
                    <th>White Wines</th>
                    <th>Wine name</th>
                    <th>Vintage</th>
                    <th>Country</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row2 = mysqli_fetch_array($white_wines)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row2["name"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row2["vintage"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row2["country"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($row2["price"], 0, ".", " ") . " HUF"; ?></p>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#White_Wine<?php echo $row2['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="White_Wine<?php echo $row2['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="White_Wine_Label<?php echo $row2['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="White_wine_Label<?php echo $row2['id'] ?>">White Wine - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">

                                                <div class="form-outline">
                                                    <input type="text" id="wine" name="White_wine_name" class="form-control" />
                                                    <label class="form-label" for="wine">Wine Name</label>
                                                </div>

                                                <div class="form-outline">
                                                    <input type="text" id="vintage" name="White_wine_vintage" class="form-control" />
                                                    <label class="form-label" for="vintage">Vintage</label>
                                                </div>


                                                <div class="form-outline">
                                                    <input type="text" id="country" name="White_wine_country" class="form-control" />
                                                    <label class="form-label" for="country">Country</label>
                                                </div>


                                                <div class="form-outline">
                                                    <input type="text" id="price" name="White_wine_price" class="form-control" />
                                                    <label class="form-label" for="price">Price (only numbers)</label>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?php echo $row2['id'] ?>">
                                                    <input type="submit" name="changeWhiteWine" class="btn btn-primary" value="Save changes">
                                                </div>

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