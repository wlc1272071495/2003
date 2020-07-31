<?php

    @include_once("./conn.php");

    $user = $_GET["user"];
    $goodsId = $_GET["goodsId"];
    $buyNum = $_GET["buyNum"];  

    // 将数据插入到shoppingcar表中   (无脑新增)
    $insert = "insert into `shoppingcar`(user,goodsId,buyNum) values('$user','$goodsId','$buyNum')";

    mysqli_query($conn,$insert);

    $row = mysqli_affected_rows($conn);

    $msg=array();
    if($row>0){
        $msg["status"] = true;
        $msg["msg"] = "加入成功";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "加入失败";
        $msg["sql"] = $insert;
    }

    echo json_encode($msg);








?>