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
    header("location: ./?p=adminLogin");
    die();
}


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


if (isset($_POST['changeFoodMenu1'])) {
    $Menu1_id = $_POST['id'];
    $Menu1_price_id = $_POST['menu1_id'];

    $Menu1_food = mysqli_real_escape_string($con, $_POST['foodNameMenu1']);
    $Menu1_ingredients = mysqli_real_escape_string($con, $_POST['IngredientsMenu1']);
    $Menu1_price = mysqli_real_escape_string($con, $_POST['PriceMenu1']);
    $Menu1_price_wine = mysqli_real_escape_string($con, $_POST['PriceWineMenu1']);

    if (!empty($Menu1_food)) {
        mysqli_query($con, "UPDATE menu1 SET food = '$Menu1_food' WHERE id = '$Menu1_id'");
    }
    if (!empty($Menu1_ingredients)) {
        mysqli_query($con, "UPDATE menu1 SET ingredients = '$Menu1_ingredients' WHERE id = '$Menu1_id'");
    }
    if (!empty($Menu1_price)) {
        mysqli_query($con, "UPDATE menu_price SET price = '$Menu1_price' WHERE id = '$Menu1_price_id'");
    }
    if (!empty($Menu1_price_wine)) {
        mysqli_query($con, "UPDATE menu_price SET wine_price = '$Menu1_price_wine' WHERE id = '$Menu1_price_id'");
    }

    $success = "The menu is successfully updated";


    header("Refresh: 2; url= ./?p=changeMenu");
}

if (isset($_POST['changeFoodMenu2'])) {
    $Menu2_id = $_POST['id'];
    $Menu2_price_id = $_POST['menu2_id'];

    $Menu2_food = mysqli_real_escape_string($con, $_POST['foodNameMenu2']);
    $Menu2_ingredients = mysqli_real_escape_string($con, $_POST['IngredientsMenu2']);
    $Menu2_price = mysqli_real_escape_string($con, $_POST['PriceMenu2']);
    $Menu2_price_wine = mysqli_real_escape_string($con, $_POST['PriceWineMenu2']);

    if (!empty($Menu2_food)) {
        mysqli_query($con, "UPDATE menu2 SET food = '$Menu2_food' WHERE id = '$Menu2_id'");
    }
    if (!empty($Menu2_ingredients)) {
        mysqli_query($con, "UPDATE menu2 SET ingredients = '$Menu2_ingredients' WHERE id = '$Menu2_id'");
    }
    if (!empty($Menu2_price)) {
        mysqli_query($con, "UPDATE menu_price SET price = '$Menu2_price' WHERE id = '$Menu2_price_id'");
    }
    if (!empty($Menu2_price_wine)) {
        mysqli_query($con, "UPDATE menu_price SET wine_price = '$Menu2_price_wine' WHERE id = '$Menu2_price_id'");
    }

    $success = "The menu is successfully updated";


    header("Refresh: 2; url= ./?p=changeMenu");
}

if (isset($_POST['changeFoodMenu3'])) {
    $Menu3_id = $_POST['id'];
    $Menu3_price_id = $_POST['menu3_id'];

    $Menu3_food = mysqli_real_escape_string($con, $_POST['foodNameMenu3']);
    $Menu3_ingredients = mysqli_real_escape_string($con, $_POST['IngredientsMenu3']);
    $Menu3_price = mysqli_real_escape_string($con, $_POST['PriceMenu3']);
    $Menu3_price_wine = mysqli_real_escape_string($con, $_POST['PriceWineMenu3']);

    if (!empty($Menu3_food)) {
        mysqli_query($con, "UPDATE menu3 SET food = '$Menu3_food' WHERE id = '$Menu3_id'");
    }
    if (!empty($Menu3_ingredients)) {
        mysqli_query($con, "UPDATE menu3 SET ingredients = '$Menu3_ingredients' WHERE id = '$Menu3_price_id'");
    }
    if (!empty($Menu3_price)) {
        mysqli_query($con, "UPDATE menu_price SET price = '$Menu3_price' WHERE id = '$Menu3_price_id'");
    }
    if (!empty($Menu3_price_wine)) {
        mysqli_query($con, "UPDATE menu_price SET wine_price = '$Menu3_price_wine' WHERE id = '$Menu3_price_id'");
    }

    $success = "The menu is successfully updated";


    header("Refresh: 2; url= ./?p=changeMenu");
}

if (isset($_POST['changeFoodStarter'])) {
    $Starter_id = $_POST['id'];

    $Starter_food = mysqli_real_escape_string($con, $_POST['foodNameStarter']);
    $Starter_ingredients = mysqli_real_escape_string($con, $_POST['IngredientsStarter']);
    $Starter_price = mysqli_real_escape_string($con, $_POST['PriceStarter']);

    if (!empty($Starter_food)) {
        mysqli_query($con, "UPDATE starters SET food = '$Starter_food' WHERE id = '$Starter_id'");
    }
    if (!empty($Starter_ingredients)) {
        mysqli_query($con, "UPDATE starters SET ingredients = '$Starter_ingredients' WHERE id = '$Starter_id'");
    }
    if (!empty($Starter_price)) {
        mysqli_query($con, "UPDATE starters SET price = '$Starter_price' WHERE id = '$Starter_id'");
    }

    $success = "The menu is successfully updated";


    header("Refresh: 2; url= ./?p=changeMenu");
}

if (isset($_POST['changeFoodMain'])) {
    $Main_id = $_POST['id'];

    $Main_food = mysqli_real_escape_string($con, $_POST['foodNameMain']);
    $Main_ingredients = mysqli_real_escape_string($con, $_POST['IngredientsMain']);
    $Main_price = mysqli_real_escape_string($con, $_POST['PriceMain']);

    if (!empty($Main_food)) {
        mysqli_query($con, "UPDATE main SET food = '$Main_food' WHERE id = '$Main_id'");
    }
    if (!empty($Main_ingredients)) {
        mysqli_query($con, "UPDATE main SET ingredients = '$Main_ingredients' WHERE id = '$Main_id'");
    }
    if (!empty($Main_price)) {
        mysqli_query($con, "UPDATE main SET price = '$Main_price' WHERE id = '$Main_id'");
    }

    $success = "The menu is successfully updated";


    header("Refresh: 2; url= ./?p=changeMenu");
}

if (isset($_POST['changeFoodSauce'])) {
    $Sauce_id = $_POST['id'];
    $Sauce_food = mysqli_real_escape_string($con, $_POST['foodNameSauce']);

    $Sauce_changeFood = mysqli_query($con, "UPDATE sauces SET sauces = '$Sauce_food' WHERE id = '$Sauce_id'");

    $success = "The menu is successfully updated";


    header("Refresh: 2; url= ./?p=changeMenu");
}

if (isset($_POST['changeFoodDessert'])) {
    $Dessert_id = $_POST['id'];

    $Dessert_food = mysqli_real_escape_string($con, $_POST['foodNameDessert']);
    $Dessert_ingredients = mysqli_real_escape_string($con, $_POST['IngredientsDessert']);
    $Dessert_price = mysqli_real_escape_string($con, $_POST['PriceDessert']);

    if (!empty($Dessert_food)) {
        mysqli_query($con, "UPDATE desserts SET food = '$Dessert_food' WHERE id = '$Dessert_id'");
    }
    if (!empty($Dessert_ingredients)) {
        mysqli_query($con, "UPDATE desserts SET ingredients = '$Dessert_ingredients' WHERE id = '$Dessert_id'");
    }
    if (!empty($Dessert_price)) {
        mysqli_query($con, "UPDATE desserts SET price = '$Dessert_price' WHERE id = '$Dessert_id'");
    }

    $success = "The menu is successfully updated";


    header("Refresh: 2; url= ./?p=changeMenu");
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
                                        <a class="dropdown-item active" href="./?p=changeMenu">Menu</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./?p=changeWine">Wine</a>
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

    

        <table class="table table-dark table-striped align-middle mb-0">
            <thead>
                <tr>
                    <th>Menu1</th>
                    <th>Food name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Wine pairing price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row1 = mysqli_fetch_array($result1)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row1["food"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row1["ingredients"] ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($menu_price1["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($menu_price1["wine_price"], 0, ".", " ")." HUF / Person" ?></p>
                        </td>

                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Menu1<?php echo $row1['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Menu1<?php echo $row1['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Menu1_Label<?php echo $row1['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Menu1_Label<?php echo $row1['id'] ?>">Menu - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">

                                                <div class="form-outline">
                                                    <input type="text" id="food" name="foodNameMenu1" class="form-control" />
                                                    <label class="form-label" for="food">Food Name</label>
                                                </div>



                                                <div class="form-outline">
                                                    <input type="text" id="ingredients" name="IngredientsMenu1" class="form-control" />
                                                    <label class="form-label" for="ingredients">Ingredients (separated with comma and space)</label>
                                                </div>


                                                <div class="form-outline">
                                                    <input type="text" id="price" name="PriceMenu1" class="form-control" />
                                                    <label class="form-label" for="price">Price (only numbers)</label>
                                                </div>

                                                <div class="form-outline">
                                                    <input type="text" id="price" name="PriceWineMenu1" class="form-control" />
                                                    <label class="form-label" for="wine_price">Price (only numbers)</label>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="hidden" name="menu1_id" value="<?php echo $menu_price1['menu1_id'] ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row1['id'] ?>">
                                                    <input type="submit" name="changeFoodMenu1" class="btn btn-primary" value="Save changes">
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
                    <th>Menu2</th>
                    <th>Food name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Wine pairing price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row2 = mysqli_fetch_array($result2)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row2["food"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row2["ingredients"] ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($menu_price2["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($menu_price2["wine_price"], 0, ".", " ")." HUF / Person" ?></p>
                        </td>

                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Menu2<?php echo $row2['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Menu2<?php echo $row2['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Menu2_Label<?php echo $row2['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Menu2_Label<?php echo $row2['id'] ?>">Menu - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">


                                                <div class="form-outline">
                                                    <input type="text" id="food" name="foodNameMenu2" class="form-control" />
                                                    <label class="form-label" for="food">Food Name</label>
                                                </div>



                                                <div class="form-outline">
                                                    <input type="text" id="ingredients" name="IngredientsMenu2" class="form-control" />
                                                    <label class="form-label" for="ingredients">Ingredients (separated with comma and space)</label>
                                                </div>


                                                <div class="form-outline">
                                                    <input type="text" id="price" name="PriceMenu2" class="form-control" />
                                                    <label class="form-label" for="price">Price (only numbers)</label>
                                                </div>

                                                <div class="form-outline">
                                                    <input type="text" id="price" name="PriceWineMenu2" class="form-control" />
                                                    <label class="form-label" for="price">Price (only numbers)</label>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="hidden" name="menu2_id" value="<?php echo $menu_price2['menu2_id'] ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row2['id'] ?>">
                                                    <input type="submit" name="changeFoodMenu2" class="btn btn-primary" value="Save changes">
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
                    <th>Menu3</th>
                    <th>Food name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Wine pairing price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row3 = mysqli_fetch_array($result3)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row3["food"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row3["ingredients"] ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($menu_price3["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($menu_price3["wine_price"], 0, ".", " ")." HUF / Person" ?></p>
                        </td>

                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Menu3<?php echo $row3['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Menu3<?php echo $row3['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Menu3_Label<?php echo $row3['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Menu3_Label<?php echo $row3['id'] ?>">Menu - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">

                                                <div class="form-outline">
                                                    <input type="text" id="food" name="foodNameMenu3" class="form-control" />
                                                    <label class="form-label" for="food">Food Name</label>
                                                </div>



                                                <div class="form-outline">
                                                    <input type="text" id="ingredients" name="IngredientsMenu3" class="form-control" />
                                                    <label class="form-label" for="ingredients">Ingredients (separated with comma and space)</label>
                                                </div>


                                                <div class="form-outline">
                                                    <input type="text" id="price" name="PriceMenu3" class="form-control" />
                                                    <label class="form-label" for="price">Price (only numbers)</label>
                                                </div>

                                                <div class="form-outline">
                                                    <input type="text" id="price" name="PriceWineMenu3" class="form-control" />
                                                    <label class="form-label" for="price">Price (only numbers)</label>
                                                </div>

                                                <div class="modal-footer">
                                                <input type="hidden" name="menu3_id" value="<?php echo $menu_price3['menu3_id'] ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row3['id'] ?>">
                                                    <input type="submit" name="changeFoodMenu3" class="btn btn-primary" value="Save changes">
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
                    <th>Starters</th>
                    <th>Food name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row4 = mysqli_fetch_array($result4)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row4["food"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row4["ingredients"] ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($row4["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Starter<?php echo $row4['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Starter<?php echo $row4['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Starter_Label<?php echo $row4['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Starter_Label<?php echo $row4['id'] ?>">Menu - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">
                                                
                                                    <div class="form-outline">
                                                        <input type="text" id="food" name="foodNameStarter" class="form-control" />
                                                        <label class="form-label" for="food">Food Name</label>
                                                    </div>


                                            
                                                    <div class="form-outline">
                                                        <input type="text" id="ingredients" name="IngredientsStarter" class="form-control" />
                                                        <label class="form-label" for="ingredients">Ingredients (separated with comma and space)</label>
                                                    </div>

                                            
                                                    <div class="form-outline">
                                                        <input type="text" id="price" name="PriceStarter" class="form-control" />
                                                        <label class="form-label" for="price">Price (only numbers)</label>
                                                    </div>

                                                    <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?php echo $row4['id'] ?>">
                                                    <input type="submit" name="changeFoodStarter" class="btn btn-primary" value="Save changes">
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
                    <th>Main</th>
                    <th>Food name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row5 = mysqli_fetch_array($result5)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row5["food"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row5["ingredients"] ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($row5["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Main<?php echo $row5['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Main<?php echo $row5['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Main_Label<?php echo $row5['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Main_Label<?php echo $row5['id'] ?>">Menu - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">
                                                
                                                    <div class="form-outline">
                                                        <input type="text" id="food" name="foodNameMain" class="form-control" />
                                                        <label class="form-label" for="food">Food Name</label>
                                                    </div>


                                            
                                                    <div class="form-outline">
                                                        <input type="text" id="ingredients" name="IngredientsMain" class="form-control" />
                                                        <label class="form-label" for="ingredients">Ingredients (separated with comma and space)</label>
                                                    </div>

                                                    <div class="form-outline">
                                                        <input type="text" id="price" name="PriceMain" class="form-control" />
                                                        <label class="form-label" for="price">Price (only numbers)</label>
                                                    </div>

                                                    <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?php echo $row5['id'] ?>">
                                                    <input type="submit" name="changeFoodMain" class="btn btn-primary" value="Save changes">
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
                    <th>Sauces</th>
                    <th>Food name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row6 = mysqli_fetch_array($result6)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row6["sauces"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">
                                <?php echo "" ?>
                            </p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">
                                <?php echo "" ?>
                            </p>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Sauce<?php echo $row6['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Sauce<?php echo $row6['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Sauce_Label<?php echo $row6['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Sauce_Label<?php echo $row6['id'] ?>">Menu - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post" class="row">
                                                <div class="col-8">
                                                    <div class="form-outline">
                                                        <input type="text" id="food" name="foodNameSauce" class="form-control" />
                                                        <label class="form-label" for="food">Sauce Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <input type="hidden" name="id" value="<?php echo $row6['id'] ?>">
                                                    <input type="submit" name="changeFoodSauce" class="btn btn-primary" value="Change">
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
                    <th>Desserts</th>
                    <th>Food name</th>
                    <th>Ingredients</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row7 = mysqli_fetch_array($result7)) { ?>
                    <tr>
                        <td>
                            <p class="fw-normal mb-1"><?php ""; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row7["food"] ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $row7["ingredients"] ?></p>
                        </td>

                        <td>
                            <p class="fw-normal mb-1"><?php echo number_format($row7["price"], 0, ".", " ") . " HUF / Person"; ?></p>
                        </td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Dessert<?php echo $row7['id'] ?>">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-dark" id="Dessert<?php echo $row7['id'] ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="Dessert_Label<?php echo $row7['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Dessert_Label<?php echo $row7['id'] ?>">Menu - Edit</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center">

                                            <form action="" method="post">
                                                
                                                    <div class="form-outline">
                                                        <input type="text" id="food" name="foodNameDessert" class="form-control" />
                                                        <label class="form-label" for="food">Food Name</label>
                                                    </div>


                                            
                                                    <div class="form-outline">
                                                        <input type="text" id="ingredients" name="IngredientsNameDessert" class="form-control" />
                                                        <label class="form-label" for="ingredients">Ingredients (separated with comma and space)</label>
                                                    </div>

                                            
                                                    <div class="form-outline">
                                                        <input type="text" id="price" name="PriceNameDessert" class="form-control" />
                                                        <label class="form-label" for="price">Price (only numbers)</label>
                                                    </div>

                                                    <div class="modal-footer">
                                                    <input type="hidden" name="id" value="<?php echo $row7['id'] ?>">
                                                    <input type="submit" name="changeFoodStarter" class="btn btn-primary" value="Save changes">
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