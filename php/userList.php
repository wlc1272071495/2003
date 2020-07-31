<?php
    @include_once("conn.php");

    $search = "select * from `userinfo` limit 0,10";

    $result = mysqli_query($conn,$search);

    // $item=mysqli_fetct_assoc($result);

    $list = array();
    // 有数据继续解析  没有数据跳出循环
    while($item = mysqli_fetch_assoc($result)){
        array_push($list,$item);
    }

    echo json_encode($list);

?>