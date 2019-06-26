<?php
session_start();
include 'config.php';
include 'functions.php';

if (isLogin()) {
    header('Location: user.php');
}

if(!empty($_POST)) {
    if(!$_POST['username'] || !$_POST['password']) {
//        die('表单填写不完整, 请重新输入');
        ajaxReturn(1,'表单填写不完整, 请重新输入');
    }

    if(!checkcode()) {
//        die('验证码错误, 请重新输入');
        ajaxReturn(1,'验证码错误, 请重新输入');
    }

    $db = getDbLink();
    $sql = "SELECT * FROM `user` WHERE `username`='" . $_POST['username'] . "'";
    $result = mysqli_query($db, $sql);
    if (mysqli_errno($db) != 0) {
        // 处理错误
        die(mysqli_error($db));
    }
    $user = mysqli_fetch_assoc($result);
    if(!$user) {
//        die('您输入的账号和密码不符, 请重新输入');
        ajaxReturn(1,'您输入的账号和密码不符, 请重新输入');
    }
    if ($user['password'] != password($_POST['password'], $user['username'])) {
//        die('您输入的账号和密码不符, 请重新输入');
        ajaxReturn(1,'您输入的账号和密码不符, 请重新输入');
    }

    // 登录成功
    $_SESSION['user'] = $user;

    ajaxReturn(0,'登录成功', ['goUrl' => 'user.php']);
//    header('Location: user.php');
}

include 'views/signin.html';