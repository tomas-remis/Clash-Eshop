<?php
require("../header.php");
session_destroy();  
header('Location: /clash/unverified/login.php');
?>