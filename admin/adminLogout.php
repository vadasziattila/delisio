<?php

session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
header("Location: ./?p=adminLogin");
die();