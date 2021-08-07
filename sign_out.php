<?php 
session_start();
session_destroy();

setcookie("lastVisitS", $visitS, time()-3600);
setcookie("lastVisitT", $visitT, time()-3600);
setcookie("lastVisitA", $visitA, time()-3600);


header('location: index.php');
exsit();
?>