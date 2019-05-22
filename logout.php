<?php
require_once('conect.php');
session_destroy();
header("refresh:3;url=index.html");
echo "Logging out...Please Wait...";
?>