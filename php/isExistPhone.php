<?php
    @include_once("conn.php");
    @include_once("common.php");
    // 查询某个用户是否存在

    $phone = $_GET["phone"];
    // $u_id = $_GET["u_id"];   // 此种写法 前端必须要传u_id

    if(isset($_GET["u_id"])){  // 先判断 u_id是否存在  存在则接收
        $u_id = $_GET["u_id"]; 
        $flag = isExist("phone",$phone,$u_id);  // 排除自己
    }else{
        $flag = isExist("phone",$phone,null);  // 在整个表中查询
    }

    $msg = array();
    if(!$flag){
        $msg["status"] = true;
        $msg["msg"] = "可以使用的手机号";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "手机号已存在";
    }
    // echo "123123";
    echo json_encode($msg);




    // 查询某个用户是否存在

 /*    $phone = $_GET["phone"];

    $search = "select * from `userinfo` where phone = '$phone'";

    $result = mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    $msg = array();
    if(!$item){
        $msg["status"] = true;
        $msg["msg"] = "可以使用的手机号";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "手机号已存在";
    }

    echo json_encode($msg); */
   




?>