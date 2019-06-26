<?php
function findPosts($db, $section_id, $num = 6){
    $sql = "SELECT * FROM `post` WHERE `section_id`=".$section_id." ORDER BY `publish_at` DESC LIMIT 6";
    $result = mysqli_query($db, $sql);
    if (mysqli_errno($db) != 0) {
        // 处理错误
        die(mysqli_error($db));
    }
    // 取出全部数据到一个二维数组中
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function pages($page, $totalPages, $half, $url) {
    if($totalPages == 0) {
        return '';
    }
    $start = $page - $half;
    $end = $page + $half;
    $start = $start < 1 ? 1 : $start;
    $end = $end > $totalPages ? $totalPages : $end;

    $url .= strpos($url, '?') != false ? '&' : '?';

    $pages = '<nav aria-label="Page navigation"><ul class="pagination pagination-sm"><li>';

    if($page != 1) {
        $pages .= '<a href="'.$url.'page='.($page - 1).'" aria-label="Previous">';
        $pages .= '<span aria-hidden="true">&laquo;</span>';
        $pages .= '</a>';
    } else {
        $pages .= '<span aria-hidden="true">&laquo;</span>';
    }
    $pages .='</li>';

    if($start != 1){
        $pages .= '<li><a href="'.$url.'">1</a></li>';
    }
    if($start - 1 > 1){
        $pages .= '<li><span>...</span></li>';
    }

    for($i = $start; $i<=$end; $i++) {
        if($i == $page){
            $pages .= '<li class="active"><span>'.$i.' <span class="sr-only">(current)</span></span></li>';
        } else {
            $pages .= '<li><a href="'.$url.'page='.$i.'">'.$i.'</a></li>';
        }
    }


    if($end + 1 < $totalPages) {
        $pages .= '<li><span>...</span></li>';
    }
    if($end != $totalPages){
        $pages .= '<li><a href="'.$url.'page='.$totalPages.'">'.$totalPages.'</a></li>';
    }

    $pages .= '<li>';
    if($page != $totalPages) {
        $pages .=  '<a href="'.$url.'page='.($page + 1).'" aria-label="Next">';
        $pages .=  '<span aria-hidden="true">&raquo;</span>';
        $pages .=  '</a>';
    }else {
        $pages .=  '<span aria-hidden="true">&raquo;</span>';
    }
    $pages .= '</li></ul></nav>';

    return $pages;
}

// 获取记录总数
function getTotalNum($db, $table, $where) {
    $sql = "SELECT COUNT(`id`) AS total FROM `".$table."` WHERE " . $where;
    $result = mysqli_query($db, $sql);
    if (mysqli_errno($db) != 0) {
        // 处理错误
        die(mysqli_error($db));
    }
    // 获取记录总数
    $total = mysqli_fetch_assoc($result);
    return $total['total'];
}

function getDbLink() {
    $db = @mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD,DB_NAME);

    if(mysqli_connect_errno() != 0){
        // 处理错误
        die(mysqli_connect_error());
    }
    return $db;
}

function getReplyCount($db, $id) {
    $sql = "SELECT COUNT(`id`) AS reply_count FROM `thread` WHERE `post_id`=" . $id;
    $result = mysqli_query($db, $sql);
    if (mysqli_errno($db) != 0) {
        // 处理错误
        die(mysqli_error($db));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['reply_count'];
}

function password($pswd, $username) {
    return md5($pswd. $username);
}

function isLogin() {
    return isset($_SESSION['user']);
}

function checkcode() {
    $authcode = $_POST['authcode'];
    return strtoupper($authcode) == $_SESSION['authcode'];
}

function ajaxReturn($status, $message = '', $data = []) {
    echo json_encode([
        'status' => $status,
        'message' => $message,
        'data' => $data,
    ]);
    exit;
}