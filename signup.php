<?php
session_start();
include 'config.php';
include 'functions.php';

if(!empty($_POST)) {

    if(!$_POST['username'] || !$_POST['password'] || !$_POST['confirm_password']) {
//        die('表单填写不完整, 请重新输入');
        ajaxReturn(1,'表单填写不完整, 请重新输入');
    }

    // 1. 确认两次输入的密码是一样的
    if ($_POST['password'] != $_POST['confirm_password']) {
//        die('两次输出密码不一致, 请重新输入');
        ajaxReturn(1,'两次输出密码不一致, 请重新输入');
    }

    // 2. 检测用户名是否已注册
    $db = getDbLink();
    $sql = "SELECT * FROM `user` WHERE `username`='" . $_POST['username'] . "'";
    $result = mysqli_query($db, $sql);
    if (mysqli_errno($db) != 0) {
        // 处理错误
        die(mysqli_error($db));
    }
    $user = mysqli_fetch_assoc($result);
    if($user) {
//        die('该用户名已注册, 请重新输入');
        ajaxReturn(1,'该用户名已注册, 请重新输入');
    }

    // 3. 把用户信息保存到数据库中
    $passtr = 'hello,hah';
    $password = password($_POST['password'], $_POST['username']);
    $sql = "INSERT INTO `user` (`id`, `username`, `password`, `create_time`) 
            VALUES (null, '" . $_POST['username'] . "', '" . $password . "', ". time() .")";
    mysqli_query($db, $sql);
    if (mysqli_errno($db) != 0) {
        // 处理错误
        die(mysqli_error($db));
    }

    ajaxReturn(0,'注册成功', ['goUrl' => 'signin.php']);
//    header('Location: signin.php');
}

include 'views/signup.html';