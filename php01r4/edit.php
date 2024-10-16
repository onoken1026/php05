<?php
require 'db_connect.php';  // データベース接続
require 'auth_check.php';  // 認証チェック


// 編集するデータのIDを取得
$id = $_GET['id'];

// データベースから現在のデータを取得
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

// データが見つからない場合の処理
if (!$data) {
    echo "データが見つかりません。";
    exit;
}

// フォームからの入力を受け取った場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値を取得
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

    // データベースを更新
    $stmt = $pdo->prepare("UPDATE gs_bm_table SET company_name = :company_name, email = :mail, industory = :industry, company_size = :company_size, average_prpduts = :average_products, inspection_method = :inspection_method, current_challenges = :current_challenges, interest = :interest, benefits = :benefits, check_items = :check_items, budget = :budget, adpption = :adoption, concerns = :concerns, current_software = :current_software, support_needs = :support_needs, priority = :priority WHERE id = :id");
    $stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);
    $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
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
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "データが正常に更新されました。";
    header("Location: read.php"); // リストページにリダイレクト
    exit;
}
?>

<!-- 編集用フォーム -->
<html>
<head>
    <title>データ編集</title>
    <meta charset="utf-8">
</head>
<body>
    <form action="" method="post">
        <label for="company_name">会社名:</label>
        <input type="text" name="company_name" value="<?= htmlspecialchars($data['company_name'], ENT_QUOTES) ?>">
        <br>
        <label for="mail">メールアドレス:</label>
        <input type="email" name="mail" value="<?= htmlspecialchars($data['email'], ENT_QUOTES) ?>">
        <br>
        <!-- 他のフィールドも同様に表示 -->
        <input type="submit" value="更新">
    </form>
</body>
</html>

