<?php
$dsn = 'mysql:host=localhost;dbname=gs_kadai01_db;charset=utf8mb4';  // ローカルサーバー用のDB名
$user = 'root';  // ローカルサーバーのphpMyAdminで使用しているユーザー名
$password = '';  // ローカルサーバーのphpMyAdminで使用しているパスワード

try {
    // PDOインスタンスを作成
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを例外に設定
} catch (PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
    exit;
}
?>
