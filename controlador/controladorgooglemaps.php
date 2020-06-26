<?php
session_start();
$lat=$_SESSION['lat'];
$lon=$_SESSION['lon'];

$latCli=$_SESSION['latCli'];
$lonCli=$_SESSION['lonCli'] ;

print "<script>\n";
print "window.open(\"https://www.google.es/maps/dir/$lat,$lon/$latCli,$lonCli\");\n";
print "</script>";

?>