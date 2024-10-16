<?php
session_start();

// 認証されていない場合、ログインページにリダイレクト
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
