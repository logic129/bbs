<?php
session_start();
include 'config.php';
include 'functions.php';

$section_id = $_GET['sid'];

$current = $sections[$section_id]['name'];

// 获取数据
$db = getDbLink();

$total = getTotalNum($db, 'post', '`section_id`='.$section_id);
$totalPages = ceil($total / $pagesize);
// 获取当前页码
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $pagesize;
// 获取版块下的帖子
$sql = "SELECT * 
        FROM `post` 
        WHERE `section_id`=" . $section_id ." 
        ORDER BY `publish_at` 
        DESC LIMIT " . $pagesize . " OFFSET " . $offset;

$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
// 取出全部数据到一个二维数组中
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 截取内容作为摘要
// mb_substr(strip_tags($post['content']), 0, 80)

// 获取侧栏数据

// 查询最新8条
$sql = "SELECT * FROM `post` WHERE `section_id`=".$section_id." ORDER BY `publish_at` DESC LIMIT 8";
$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
// 取出全部数据到一个二维数组中
$lasted = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 查询最热8条
$sql = "SELECT `post`.*, COUNT(`post`.`id`) AS reply_count 
        FROM `post` 
        RIGHT JOIN `thread` ON `post`.`id` = `thread`.`post_id` 
        WHERE `section_id`=".$section_id." 
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
//print_r($hots);

include 'views/section.html';