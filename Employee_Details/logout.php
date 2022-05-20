<?php

session_start();
unset($_SESSION['auth']);
unset($_SESSION["id"]);
unset($_SESSION["name"]);
session_destroy();
header("Location:login.php");