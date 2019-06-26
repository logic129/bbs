<?php
session_start();
include 'config.php';
include 'functions.php';

unset($_SESSION['user']);
header('Location: user.php');