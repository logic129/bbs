<?php
date_default_timezone_set('Asia/Shanghai');

// 数据库连接参数
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'bbs');

// 版块设置
$sections = [
    '1' => ['name' => 'Backend', 'image' => 'static/attaches/section_1.jpg'],
    '2' => ['name' => 'Frontend', 'image' => 'static/attaches/section_2.jpg'],
    '3' => ['name' => 'Database', 'image' => 'static/attaches/section_3.jpg'],
    '4' => ['name' => 'UI', 'image' => 'static/attaches/section_4.jpg'],
];

// 分页参数
$half = 2;
$pagesize = 5;
