<?php
require_once 'db_connect.php';  // データベース接続ファイルをインクルード
require 'auth_check.php';  // 認証チェック


$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    // クエリを実行
    $stmt->execute();

    echo "データが正常に削除されました。";
    header('Location: read.php');  // 削除後にデータ一覧に戻る
    exit;

} catch (PDOException $e) {
    echo 'データ削除エラー: ' . $e->getMessage();
}
?>
