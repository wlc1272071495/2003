<?php
    @include("conn.php");

    // 接收前端传入的user和pwd
    $account = $_POST["account"];  // 接收账号 (用户名/手机号/邮箱)
    $pwd = $_POST["pwd"];

    $search = "select * from `userinfo` where user='$account' or phone = '$account' or email = '$account'";

    $result = mysqli_query($conn,$search);  //执行语句 得到一个结果对象

    // 解析结果对象 可能出现两种情况
    //  1. 存在该用户  返回一个关联数组
    //  2. 不存在该用户  返回false
    $item = mysqli_fetch_assoc($result); 

    $msg =array();
    if($item){
        $realPwd = $item["pwd"];
        if($pwd==$realPwd){
            $msg["status"] = true;
            $msg["user"] = $item["user"]; // 因为接收账号可能是 (用户名/手机号/邮箱) 所以返回对应账号的用户名 (标识用户身份)
            $msg["msg"] = "登录成功";
        }else{
            $msg["status"] = false;
            $msg["msg"] = "用户名或密码有误";
        }
    }else{
        $msg["status"] = false;
        $msg["msg"] = "该用户未注册";
    }

    echo json_encode($msg);





?>