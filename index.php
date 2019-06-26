<?php
session_start();
include 'functions.php';
include 'config.php';

$current = 'Home';

// 获取数据
$db = getDbLink();

// 查询版块数据
$data = [];
foreach($sections as $id => $section) {
    $data[$section['name']] = findPosts($db, $id);
}

// 查询最新8条
$sql = "SELECT * FROM `post` ORDER BY `publish_at` DESC LIMIT 8";
$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
// 取出全部数据到一个二维数组中
$lasted = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 查询最热8条
$sql = "SELECT `post`.*, COUNT(`post`.`id`) AS reply_count FROM `post` 
        RIGHT JOIN `thread` ON `post`.`id` = `thread`.`post_id` 
        GROUP BY `post`.`id` 
        ORDER BY reply_count 
        DESC LIMIT 8";
$result = mysqli_query($db, $sql);

if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
// 取出全部数据到一个二维数组中
$hots = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($data);

// 渲染数据
include 'views/index.html';
