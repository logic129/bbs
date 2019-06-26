<?php
session_start();
include 'config.php';
include 'functions.php';

$section_id = $_GET['sid'];

include './views/post-new.html';
