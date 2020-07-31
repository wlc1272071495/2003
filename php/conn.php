<?php
    @header("Content-type:text/html;charset=utf-8");

    // CORS (跨域资源共享  允许服务器访问你的接口)
    // Access Control Allow Origin  
    @header("Access-Control-Allow-Origin:*");  // 所有服务器都可以访问
    // @header("Access-Control-Allow-Origin:http://127.0.0.1:5500");   // 允许其他服务器访问当前apache 服务器的接口

    // 连接mysql 
    // $conn = mysqli_connect("localhost:3306","root","root");   // 返回 连接对象
    // print_r($conn);

    // 选择数据库
    // $res = mysqli_select_db($conn,"2003");


    // $conn = mysqli_connect("localhost:3306","root","root","2003");
    $conn = mysqli_connect("127.0.0.1:3306","root","root","2003");

    // if($res){
    //     echo "success";
    // }else{
    //     echo "fail";
    // }

    mysqli_query($conn,"set names utf8");   // 从数据库 取数据的时候  将数据转为utf-8
    mysqli_query($conn,"set character set utf-8");  // 向数据库 存数据的时候  将数据转为utf-8



