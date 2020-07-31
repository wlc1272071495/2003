<?php  
    @include_once("conn.php");

    // 根据id查询用户

    $u_id = $_GET["u_id"];

    $search = "select * from `userinfo` where u_id = '$u_id'";

    $result = mysqli_query($conn,$search);

    $item=mysqli_fetch_assoc($result);

    echo json_encode($item);   //查询的数据


?>