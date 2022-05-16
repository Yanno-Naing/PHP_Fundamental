<?php 

echo $_COOKIE["username"];

var_dump($_COOKIE);

setcookie("username","",time()-3600, "/Intern_Projects");
setcookie("username","",time()-3600, "/Intern_Projects/cookies_sessions");