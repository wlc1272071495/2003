<?php
    @header("Access-Control-Allow-Origin:*");
    $user = $_POST["user"];
    $pwd = $_POST["pwd"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $arr = array(
        "user"=>$user,
        "pwd"=>$pwd,
        "phone"=>$phone,
        "email"=>$email
    );

    echo json_encode($arr);


?>