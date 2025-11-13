<?php

    require '../db/config.php';

    function login($email){
        $conn = db();
        $sql = "SELECT * FROM user WHERE email='$email'";
        return $conn->query($sql);
    }

    function verifyPassword($inputPassword, $storedPassword) {
        // You can use your own password verification logic here
        // For example, you might compare the passwords directly
        return $inputPassword === $storedPassword;
    }
?>