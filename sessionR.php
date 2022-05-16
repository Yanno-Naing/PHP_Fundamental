<?php
session_start();

echo "Hi.". $_SESSION["firstname"]. " ".$_SESSION['lastname'];

session_destroy();