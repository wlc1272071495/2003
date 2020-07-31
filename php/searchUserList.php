<?php
    @include_once("conn.php");

    $key = $_GET["key"];
    $orderCol = $_GET["orderCol"];
    $orderType = $_GET["orderType"];
    $currentPage = $_GET["currentPage"];
    $showNum = $_GET["showNum"];
    
    // 获取数据的总条数
    $getAll = "select * from `userinfo`"; //查询所有的数据
    
    $res = mysqli_query($conn,$getAll);  // 结果对象的num_rows 返回数据的总条数
    
    $count = $res->num_rows;   //得到数据的总数

    // 获取最大页码  但是由于我们是下标 (下标的最大值 = 最大页码 -1)
    $pageCountMax = ceil($count/$showNum)-1;

    // 如果currenPage(页码) 小于 0 则等于0
    if($currentPage<0){
        $currentPage = 0;
    }

    // 如果currenPage(页码) 大于 最大页码 则等于0
    if($currentPage>=$pageCountMax){
        $currentPage = $pageCountMax;
    }
    // echo  $count ,$showNum ,$pageCountMax;
    
    
    

    $skipNum = $currentPage*$showNum;


    // 0   [0,5]   (0-5)
    // 1   [5,5]   (6-10)
    // 2   [10,5]
    // 3   [15,5] 

    $search = "select * from `userinfo` where user like '%$key%' order by $orderCol $orderType limit $skipNum,$showNum";

    $result = mysqli_query($conn,$search);

    // $item=mysqli_fetct_assoc($result);

    $list = array();
    // 有数据继续解析  没有数据跳出循环
    while($item = mysqli_fetch_assoc($result)){
        array_push($list,$item);
    }

    // echo json_encode($list);   //查询的数据


    $all = array();

    $all["count"] = $count;
    $all["currentPage"] = $currentPage*1;
    $all["pageCountMax"] = $pageCountMax;
    $all["list"] = $list;
    
    echo json_encode($all);

?>