<?php  
    @include_once("conn.php");

    // 根据id查询用户

    $gid = $_GET["gid"];

    $search = "select * from `goodslist` where goodsId = '$gid'";

    $result = mysqli_query($conn,$search);

    $item = mysqli_fetch_assoc($result);

    $imglist =  explode(",",$item["goodsImgList"]);
    // $item["imgList"] = $imglist;  // 创建新的属性名
    $item["goodsImg"] = $imglist[0]; //默认显示第一张图片
    $item["goodsImgList"] = $imglist;  // 覆盖原值

    echo json_encode($item);   //查询的数据


?>