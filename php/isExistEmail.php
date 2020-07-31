<?php
    @include_once("conn.php");
    @include_once("common.php");


    // 查询某个用户是否存在

    $email = $_GET["email"];
    // $u_id = $_GET["u_id"];   // 此种写法 前端必须要传u_id

    if(isset($_GET["u_id"])){  // 先判断 u_id是否存在  存在则接收
        $u_id = $_GET["u_id"]; 
        $flag = isExist("email",$email,$u_id);  // 排除自己
    }else{
        $flag = isExist("email",$email,null);  // 在整个表中查询
    }

    $msg = array();
    if(!$flag){
        $msg["status"] = true;
        $msg["msg"] = "可以使用的邮箱";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "邮箱已存在";
    }
    // echo "123123";
    echo json_encode($msg);

    // 查询某个邮箱是否存在
/* 
    $email = $_GET["email"];

    $search = "select * from `userinfo` where email = '$email'";

    $result = mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    $msg = array();
    if(!$item){
        $msg["status"] = true;
        $msg["msg"] = "可以使用的邮箱";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "邮箱已存在";
    }

    echo json_encode($msg); */
   




?>