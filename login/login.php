<?php
    $user = $_GET['username'];
    $pass = $_GET['password'];

    $con = mysqli_connect('localhost','root','123456','wenxuan');
    $sql = "SELECT * FROM `wxlogin` WHERE `username` = '$user' AND `password` = '$pass'";

    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接错误' . mysqli_error($con));
    }

    $arr =  array();
    $row = mysqli_fetch_assoc($res);

    while($row){
        array_push($arr,$row);
        $row = mysqli_fetch_assoc($res);
    }
    if($arr){
        print_r('登录成功');
        header('location:../index/index.html');
    }else{
        print_r('用户名或者密码错误');
    }
?>