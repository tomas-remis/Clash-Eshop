<?php
require("../header.php");
require("../functions.php");

if(isset($_POST["sub"])){
    $con=connect("localhost", "root", "", "clash");
    if($con==null){
        echo "Error when connecting to database";
    }
    else{
        $sql="SELECT * FROM customers WHERE Login=? AND Password=?;";
        $state = $con->prepare($sql);
        $state->bind_param("ss", $_POST["login"], $_POST["pass"]);
        $state->execute();
        $result = $state->get_result();
        
        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $_SESSION["login"] = $row["Login"];
            $_SESSION["customerID"] = $row["CID"];
            header('Location: ../verified/home.php');
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
        <input type="text" placeholder="Username" name="login"/>
        <input type="password" placeholder="Password" name="pass"/>
        <input type="email" placeholder="Email" name="email"/>
        <input type="submit" name="sub"/>
    </form>

    <form action="register.php">
        <input type="submit", value="Register">
    </form>
</body>

<?php
include("../footer.php");
?>