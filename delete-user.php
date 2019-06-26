<?php
session_start();
include 'config.php';
include 'functions.php';

function deleteUser(){
    $db = getDbLink();
    $sql="DELETE FROM `user` WHERE `username`=".$_SESSION['user']['username'];
    if(mysqli_query($db,$sql)){
        unset($_SESSION['user']);
        header("Location:index.php");
    }
}

deleteUser();