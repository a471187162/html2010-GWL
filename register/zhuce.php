<?php
    $user = $_GET['username'];
    $pass = $_GET['password'];

    $con = mysqli_connect('localhost','root','123456','wenxuan');

    $sql = "SELECT * FROM `wxlogin` WHERE `username` = '$user' AND `password` = '$pass'";
    
    $res = mysqli_query($con,$sql);

    if(!$res){
        die('数据库链接错误' . mysqli_error($con));
    }

    $arr = array();
    $row = mysqli_fetch_assoc($res);

    if(!$row){
        $inset = "INSERT INTO `wxlogin`(`username`,`password`)
        VALUE('$user','$pass')";
        $inset_res = mysqli_query($con,$inset);
        header('location:../login/login.html');
    }else{
        die('用户名已注册');
    }
?>