<?php

    @include_once("./conn.php");

    $user = $_POST["user"];
    $goodsId = $_POST["goodsId"];
    $buyNum = $_POST["buyNum"];  

    // 判断当前用户的商品是否存在(这个人是否买了该商品)  存在则更新  不存在则新增
    if(isExistGoods($user,$goodsId)){  //存在   存在则更新
        // set buyNum = buyNum + $buyNum  在原有的数量的基础上 加上对应的数值
        $insert = "update `shoppingcar` set buyNum = buyNum + $buyNum  where user = '$user' and goodsId='$goodsId'";

        mysqli_query($conn,$insert);

    }else{ //不存在
        $insert = "insert into `shoppingcar`(user,goodsId,buyNum) values('$user','$goodsId','$buyNum')";
        mysqli_query($conn,$insert);
    }
    
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

/* 
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

    echo json_encode($msg); */




    function isExistGoods($user,$goodsId){
        global $conn;

        $search = "select * from `shoppingcar` where user = '$user' and goodsId='$goodsId'";

        $result = mysqli_query($conn,$search);

        $item = mysqli_fetch_assoc($result);

        if($item){
            return true;  // 已存在
        }else{
            return false; // 不存在
        }
    }








?>