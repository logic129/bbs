<?php
session_start();
include 'config.php';
include 'functions.php';

if (!$_SESSION['user']) {
    header('Location: signin.php');
    exit;
}


$db = getDbLink();

// 查询登录账户发布的帖子，按时间排序
$sql = "SELECT * FROM `post` WHERE `publish_by`=".$_SESSION['user']['username']." ORDER BY `publish_at` DESC";
$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

include 'views/user.html';
