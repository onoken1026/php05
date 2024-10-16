<?php
require_once 'db_connect.php';  // データベース接続ファイルをインクルード

// フォームからの入力データを受け取る
$id = $_POST["id"];
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
    $stmt = $pdo->prepare("UPDATE gs_bm_table SET company_name = :company_name, email = :email, industory = :industry, company_size = :company_size, average_prpduts = :average_products, inspection_method = :inspection_method, current_challenges = :current_challenges, interest = :interest, benefits = :benefits, check_items = :check_items, budget = :budget, adpption = :adoption, concerns = :concerns, support_needs = :support_needs, priority = :priority WHERE id = :id");

    // 値をバインドする
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
    $stmt->bindValue(':support_needs', $support_needs, PDO::PARAM_STR);
    $stmt->bindValue(':priority', $priority, PDO::PARAM_STR);

    // クエリを実行
    $stmt->execute();

    echo "データが正常に更新されました。";
    header('Location: read.php');  // データ一覧に戻る
    exit;

} catch (PDOException $e) {
    echo 'データ更新エラー: ' . $e->getMessage();
}
?>
