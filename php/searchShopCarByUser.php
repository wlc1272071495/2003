<?php

    @include_once("conn.php");

    $user = $_GET["user"];

    $search = "select s.id,s.`user` ,s.goodsId,s.buyNum,g.goodsName,g.goodsPrice,g.goodsImgList from `shoppingcar` as s,`goodslist` as g where s.goodsId = g.goodsId and s.user='$user' and s.status = '1'";

    $result = mysqli_query($conn,$search);

    $all = array();
    while($item = mysqli_fetch_assoc($result)){

        $imglist =  explode(",",$item["goodsImgList"]);
        // $item["imgList"] = $imglist;  // 创建新的属性名
        $item["goodsImg"] = $imglist[0]; //默认显示第一张图片
        $item["goodsImgList"] = $imglist;  // 覆盖原值

        array_push($all,$item);
    }


    echo json_encode($all);   //查询的数据



?>