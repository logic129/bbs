<?php
session_start();
include 'config.php';
include 'functions.php';

if(!checkcode()) {
    ajaxReturn(1, '验证码错误, 请重新输入');
}

// 接收数据
$post = [
    'subject' => '',
    'content' => $_POST['content'],
    'publish_at' => time(),
    'publish_by' => $_SESSION['user']['username'],
    'replies' => '0',
    'post_id' => $_POST['post_id'],
];
// 调试
//print_r($post);
//exit;

// 保存到数据库
$db = getDbLink();

$sql = "INSERT INTO `thread` (`id`, `subject`, `content`, `publish_at`, `publish_by`, `replies`, `post_id`) VALUES (null, '".
    $post['subject']."', '".
    $post['content']."',".
    $post['publish_at'].",'".
    $post['publish_by']."',".
    $post['replies'].", ".
    $post['post_id'].")";

mysqli_query($db, $sql);

if(mysqli_errno($db) != 0){
    // 处理错误
    die(mysqli_error($db));
}

// 数据插入成功
ajaxReturn(0, '数据已保存', ['goUrl' => 'post.php?id=' . $post['post_id']]);

// 跳转页面
//header('Location: post.php?id=' . $post['post_id']);
//exit;
