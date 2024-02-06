<?php
if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pass = $_POST["password"];

    include "classes/dbh.classes.php";
    include "classes/users.classes.php";
    include "classes/users-contr.classes.php";
    $login = new UserContr($email, $pass ,$pass);

    $login->loginUser();
      
    header("location: homepage.php?error=none");
}

