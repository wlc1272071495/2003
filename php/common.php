<?php
    @include_once("conn.php");


    // isExist($col,$val)   在整列中判断是否存在
    // isExist($col,$val,$u_id)  排除自己后 在整列中判断是否存在
    function isExist($col,$val,$u_id){
        // $user = $_GET["user"];
        global $conn;

        $search = "select * from `userinfo` where $col = '$val'";

        if(isset($u_id)){  // 判断传入的参数是否有$u_id   说明要排除自己  
            $search = $search." and  u_id != $u_id";  // 不是本人
        }

        $result = mysqli_query($conn,$search);

        $item = mysqli_fetch_assoc($result);

        if($item){
            return true;  // 已存在
        }else{
            return false; // 不存在
        }

    }





