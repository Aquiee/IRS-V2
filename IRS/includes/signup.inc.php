<?php

if(isset($_POST["submit"])){

    $email = $_POST["email"];
    $pass = $_POST["password"];
    $repeatpass = $_POST["repeatpassword"];

    include "../classes/dbh.classes.php";
    include "../classes/users.classes.php";
    include "../classes/users-contr.classes.php";
    $signup = new UserContr($email, $pass , $repeatpass);

    $signup->signupUser();
    header("location: ../homepage.php?error=none");
}