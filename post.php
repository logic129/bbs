<?php
session_start();
include 'config.php';
include 'functions.php';

// 获取帖子详情数据
$id = $_GET['id'];

// 获取数据
$db = getDbLink();

// 更新访问量
$sql = "UPDATE `post` SET `views`=`views` + 1 WHERE `id`=" . $id;
$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}

// 查询跟帖数量
$sql = "SELECT COUNT(`id`) AS replies FROM `thread` WHERE `post_id`=" . $id;
$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
$replies = mysqli_fetch_assoc($result);
//print_r($replies);

// 查询帖子数据
$sql = "SELECT * FROM  `post` WHERE `id`=" . $id;
$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}
$post = mysqli_fetch_assoc($result);
$post['replies'] = $replies['replies'];

//print_r($post);

$total = getTotalNum($db, 'thread', '`post_id`=' . $id);

$totalPages = ceil($total / $pagesize);
// 获取当前页码
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $pagesize;

// 获取跟帖
$sql = "SELECT * FROM `thread` WHERE `post_id`=" . $id ." ORDER BY `publish_at` DESC LIMIT " . $pagesize . " OFFSET " . $offset;
$result = mysqli_query($db, $sql);
if (mysqli_errno($db) != 0) {
    // 处理错误
    die(mysqli_error($db));
}

$threads = mysqli_fetch_all($result, MYSQLI_ASSOC);
//print_r($threads);

include 'views/post.html';