<?php
    @include("conn.php");

    // 写完接口记得手动打开测试(只能是get  如果是post,先写成get,测试完毕之后 改为post);
    // 获取前端传递过来的数据 (需要和参数数据队列的 key 对应)
    $user = $_POST["user"];
    $pwd = $_POST["pwd"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // if(isset($user)&&isset($pwd)&&isset($phone)&&isset($email)){

    // }

    // `userinfo`(yonghu,pwd,phone,email)  跟数据表的 column(列名) 对应
    $insert = "insert into `userinfo`(user,pwd,phone,email) values('$user','$pwd','$phone','$email')";

    mysqli_query($conn,$insert);

    $row = mysqli_affected_rows($conn);

    $msg = array();
    if($row>0){
        $msg["status"] = true;
        $msg["msg"] = "注册成功";
    }else{
        $msg["status"] = false;
        $msg["msg"] = "注册失败";
        $msg["sql"] = $insert;
    }
    
    echo json_encode($msg);


?>