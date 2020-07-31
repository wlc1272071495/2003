<?php
    @include_once("./conn.php");

    /* 
    
        名称: JavaScript (ES6) code snippets
        名称: Auto Rename Tag
        名称: AutoFileName
        名称: advanced-new-file
        名称: Auto Close Tag
        名称: Auto Complete Tag
        名称: HTML Snippets
        名称: JavaScript (ES6) code snippets
        名称: PHP IntelliSense

        名称: Auto Import - ES6 & TS
        名称: ES7 JavaScript/Node/Mongoose/MongoDB-Mysql 
    */

    $search = "select * from `goodslist` limit 0,20";

    $result = mysqli_query($conn,$search);

    $list = array();
    while($item = mysqli_fetch_assoc($result)){

        // 数据处理
        $imglist =  explode(",",$item["goodsImgList"]);

        // $item["imgList"] = $imglist;  // 创建新的属性名
        $item["goodsImg"] = $imglist[0]; //默认显示第一张图片
        $item["goodsImgList"] = $imglist;  // 覆盖原值
        array_push($list,$item);
    }

    echo json_encode($list);





?>