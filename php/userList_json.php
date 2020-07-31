<?php
    @include_once("conn.php");

    $fnName = "fn";

    $page = $_GET["page"];
    $showNum = $_GET["shownum"];
    if(isset($_GET["cb"])){
        $fnName = $_GET["cb"];
    }

    $skipNum = $page * $showNum;


    $search = "select * from `userinfo` limit $skipNum,$showNum";

    $result = mysqli_query($conn,$search);

    // $item=mysqli_fetct_assoc($result);

    $list = array();
    // 有数据继续解析  没有数据跳出循环
    while($item = mysqli_fetch_assoc($result)){
        array_push($list,$item);
    }

    // echo json_encode($list);
    // fn([])
    $str = json_encode($list);
    echo "$fnName($str)";



    /* 
        以字符串的形式输出
        fn([{ "u_id": "1", "user": "a123123", "pwd": "123123", "phone": "17386141517", "email": "1272071495@qq.com" }, { "u_id": "2", "user": "b123123", "pwd": "123123", "phone": "17386141516", "email": "1272071496@qq.com" }, { "u_id": "3", "user": "c123123", "pwd": "123123", "phone": "15935728643", "email": "127@qq.com" }, { "u_id": "4", "user": "d123123", "pwd": "123123", "phone": "17386141518", "email": "123123123@qq.com" }, { "u_id": "5", "user": "asdasd", "pwd": "123123", "phone": "17386141555", "email": "127201@qq.com" }, { "u_id": "6", "user": "abc123", "pwd": "123123", "phone": "17386141522", "email": "127123123@qq.com" }, { "u_id": "7", "user": "asdasd123", "pwd": "zxczxc123", "phone": "17386141556", "email": "127202@qq.com" }, { "u_id": "8", "user": "sdfsdf", "pwd": "123123", "phone": "17386141511", "email": "1272071433123@qq.com" }, { "u_id": "9", "user": "aa123123", "pwd": "123123", "phone": "13995719826", "email": "15761562@qq.com" }, { "u_id": "10", "user": "sunzhonglai", "pwd": "a123456", "phone": "15272009972", "email": "1651594521@qq.com" }])
    
    */

?>