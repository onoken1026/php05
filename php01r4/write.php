<?php
// データベース接続ファイルをインクルード
require 'db_connect.php';

session_start();  // セッションの開始
if (!isset($_SESSION['user_id'])) {
    // ユーザーがログインしていない場合、リダイレクト
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];  // ログインしているユーザーのID

// フォームからの入力データを取得
$company_name = $_POST["company_name"];
$mail = $_POST["mail"];
$industry = $_POST["industry"];
$company_size = $_POST["company_size"];
$average_products = $_POST["average_products"];
$inspection_method = $_POST["inspection_method"];
$current_challenges = $_POST["current_challenges"];
$interest = $_POST["interest"];
$benefits = $_POST["benefits"];
$check_items = $_POST["check_items"];
$budget = $_POST["budget"];
$adoption = $_POST["adoption"];
$concerns = $_POST["concerns"];
$current_software = $_POST["current_software"];
$support_needs = $_POST["support_needs"];
$priority = $_POST["priority"];

try {
    // データ挿入のSQLクエリを準備
    $stmt = $pdo->prepare(
        "INSERT INTO gs_bm_table 
        (user_id, company_name, email, industory, company_size, average_prpduts, 
         inspection_method, current_challenges, interest, benefits, check_items, 
         budget, adpption, concerns, current_software, support_needs, priority, created_at) 
        VALUES 
        (:user_id, :company_name, :email, :industry, :company_size, :average_products, 
         :inspection_method, :current_challenges, :interest, :benefits, :check_items, 
         :budget, :adoption, :concerns, :current_software, :support_needs, :priority, NOW())"
    );

    // 値をバインド
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $mail, PDO::PARAM_STR);
    $stmt->bindValue(':industry', $industry, PDO::PARAM_STR);
    $stmt->bindValue(':company_size', $company_size, PDO::PARAM_STR);
    $stmt->bindValue(':average_products', $average_products, PDO::PARAM_STR);
    $stmt->bindValue(':inspection_method', $inspection_method, PDO::PARAM_STR);
    $stmt->bindValue(':current_challenges', $current_challenges, PDO::PARAM_STR);
    $stmt->bindValue(':interest', $interest, PDO::PARAM_STR);
    $stmt->bindValue(':benefits', $benefits, PDO::PARAM_STR);
    $stmt->bindValue(':check_items', $check_items, PDO::PARAM_STR);
    $stmt->bindValue(':budget', $budget, PDO::PARAM_STR);
    $stmt->bindValue(':adoption', $adoption, PDO::PARAM_STR);
    $stmt->bindValue(':concerns', $concerns, PDO::PARAM_STR);
    $stmt->bindValue(':current_software', $current_software, PDO::PARAM_STR);
    $stmt->bindValue(':support_needs', $support_needs, PDO::PARAM_STR);
    $stmt->bindValue(':priority', $priority, PDO::PARAM_STR);

    // クエリを実行
    $stmt->execute();

    echo "データが正常に挿入されました。";
} catch (PDOException $e) {
    echo 'データ挿入エラー: ' . $e->getMessage();
}
?>
