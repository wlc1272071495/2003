<?php
    @header("Access-Control-Allow-Origin:*");
    $user = $_GET["user"];
    $pwd = $_GET["pwd"];
    $phone = $_GET["phone"];
    $email = $_GET["email"];

    $arr = array(
        "user"=>$user,
        "pwd"=>$pwd,
        "phone"=>$phone,
        "email"=>$email
    );

    echo json_encode($arr);


?>