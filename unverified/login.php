<?php
require("../header.php");
require("../functions.php");

if(isset($_POST["sub"])){
    $con=connect("localhost", "root", "", "test");
    if($con==null){
        echo "Error when connecting to database";
    }
    else{
        $sql="SELECT * FROM users WHERE Username=? AND Password=?;";
        $state = $con->prepare($sql);
        $state->bind_param("ss", $_POST["user"], $_POST["pass"]);
        $state->execute();
        $result = $state->get_result();
        
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $_SESSION["user"] = $row["Username"];
            $_SESSION["userID"] = $row["UID"];
            header('Location: welcome.php');
        }
        else{
            echo "Wrong credentials";
        }
    }
}
?>

<body>
    <h1>Log in</h1>
    <form method="POST" action="login.php">
        <input type="text" placeholder="login" name="user"/>
        <input type="password" placeholder="password" name="pass"/>
        <input type="email" placeholder="email" name="email"/>
        <input type="submit" name="sub"/>
    </form>

    <form action="register.php">
        <input type="submit", value="Register">
    </form>
</body>

<?php
include("footer.php");
?>