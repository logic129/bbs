<?php
session_start();
include 'functions.php';
include 'config.php';

$keyword = $_GET['k'];

// 获取数据
$db = getDbLink();
$condition = "`subject` LIKE '%" . $keyword ."%' OR `content` LIKE '%" . $keyword ."%'";
$total = getTotalNum($db, 'post', $condition);
$totalPages = ceil($total / $pagesize);
// 获取当前页码
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $pagesize;
// 获取版块下的帖子
$sql = "SELECT * 
        FROM `post` 
        WHERE " . $condition. "
        ORDER BY `publish_at` 
        DESC LIMIT " . $pagesize . " OFFSET " . $offset;

$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
// 取出全部数据到一个二维数组中
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//取出最新8条
$sql = "SELECT * 
        FROM `post` 
        WHERE " . $condition. "
        ORDER BY `publish_at` 
        DESC LIMIT 8";

$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
// 取出全部数据到一个二维数组中
$lasted = mysqli_fetch_all($result, MYSQLI_ASSOC);

//取出最热8条
$sql = "SELECT `post`.*, COUNT(`post`.`id`) AS reply_count 
FROM `post` 
RIGHT JOIN `thread` ON `post`.`id` = `thread`.`post_id` 
WHERE `post`.`subject` LIKE '%" . $keyword ."%' OR `post`.`content` LIKE '%" . $keyword ."%'
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

include 'views/search.html';