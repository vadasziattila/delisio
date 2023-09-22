<?php
session_start();

$con = Connect();
$errorEmpty = false;
if (isset($_POST['btnLogin'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    

    if (empty($email) or empty($password)) {
        $errorEmpty = true;
        $emptyEmailPassword = "Please fill the email and password!";
    }

    $query = "SELECT password FROM adminLogin WHERE email = '$email'";
    $result = mysqli_query($con, $query);


    if (!$errorEmpty) {

        $password = md5($password);
        $sql = mysqli_query($con, "SELECT * FROM adminLogin WHERE email='$email' && password='$password'");
        $num = mysqli_num_rows($sql);

        if ($num > 0) {
            //echo "found";  
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['USER_ID'] = $row['id'];
            $_SESSION['USER_NAME'] = $row['email'];
            $success = "You are logged successfully! You are redirecing within few seconds.";
            header("Refresh:2; url= ./?p=adminPanel");
        } else {
            $wrongEmailPassword = "Wrong email or password!";
        }
    }
}
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
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">


                    <?php if (isset($emptyEmailPassword)) { ?>
                        <div class="alert alert-dismissible fade show" role="alert" data-color="danger">
                            <i class="fas fa-times-circle me-3"></i><?php echo $emptyEmailPassword; ?>
                            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <?php if (isset($wrongEmailPassword)) { ?>
                        <div class="alert alert-dismissible fade show" role="alert" data-color="danger">
                            <i class="fas fa-times-circle me-3"></i><?php echo $wrongEmailPassword; ?>
                            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    
                    <?php if (isset($success)) { ?>
                        <div class="alert alert-dismissible fade show" role="alert" data-color="success">
                            <i class="fas fa-check-circle me-3"></i><?php echo $success; ?>
                            <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <div class="card shadow-2-strong">
                        <div class="card-body p-5 text-center">

                            <form action="" method="post" name="login" class="needs-validation" novalidate>

                                <h3 class="mb-5">Sign in</h3>

                                <div class="form-outline mb-4">
                                    <input name="email" type="email" id="typeEmail" class="form-control form-control-lg" <?php if (isset($success)) {
                                                                                                                                echo "disabled";
                                                                                                                            } ?> required />
                                    <label class="form-label" for="typeEmail">Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input name="password" type="password" id="typePassword" class="form-control form-control-lg IdPassword" <?php if (isset($success)) { echo "disabled";} ?> required />
                                    <i class="fas fa-eye" id="togglePassword"></i>
                                    <label class="form-label" for="typePassword">Password</label>
                                </div>


                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="1" id="rememberPassword" />
                                    <label class="form-check-label" for="rememberPassword"> Remember password </label>
                                </div>

                                <button class="btn btn-lg btn-block login-btn" name="btnLogin" type="submit" id="danger" <?php if (isset($success)) {
                                                                                                                                echo "disabled";
                                                                                                                            } ?>>
                                    <?php if (isset($success)) { ?>
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <?php } ?> <span>Login</span>
                                </button>

                                <div class="d-flex justify-content-center login-back">
                                    <div class="d-inline-block">
                                        <a href="./?p=main" class="login-back-btn"><i class="fas fa-arrow-circle-left fa-lg"></i></a>
                                    </div>
                                    <div class="d-inline-block login-back-text">
                                        Back to the main page
                                    </div>
                                </div>

                                <p class="text-center loginSmall">this page is reserved for employees only</p>
                            </form>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- JS -->
    <script src="../assets/js/login.js"></script>
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