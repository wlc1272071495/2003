<?php
    @include_once("conn.php");

    $u_id = $_GET["u_id"];
    $user = $_GET["user"];
    $pwd = $_GET["pwd"];
    $phone = $_GET["phone"];
    $email = $_GET["email"];

    $update = "update `userinfo` set user = '$user',pwd='$pwd',phone='$phone',email='$email' where u_id = $u_id";

    mysqli_query($conn,$update);

    $row = mysqli_affected_rows($conn);

    $msg = array();
    if($row>0){
        $msg["status"] = true;
        $msg["msg"] = "更新成功";
    }else if($row==0){
        $msg["status"] = true;
        $msg["msg"] = "更新成功,数据已更新";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "更新失败";
    }

    echo json_encode($msg);





?>