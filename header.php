<html>
    <head>
        <style>
            #header{
                background-color: gray;
                height: 150px;
                margin: 0px;
                margin-bottom: 20px;
            }

            body{
                padding: 0;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <nav id="header">
    </nav>
    </body>
</html>

<?php
session_set_cookie_params(7200,'/');
session_start();

if(isset($_GET["sub"])){
    session_unset();
}

echo $_SERVER["REQUEST_URI"];

if(!isset($_SESSION["user"]) && gettype(strpos($_SERVER["REQUEST_URI"], "unverified")) == "boolean"){
    header('Location: unverified/login.php');
}
?>