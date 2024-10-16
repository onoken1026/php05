<?php
require_once 'db_connect.php';  // データベース接続ファイルをインクルード

// 編集用データの取得
$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>アパレル業界の変革を支えるAIソリューション</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }
    header {
        text-align: center;
        padding: 30px 0;
        background-color: #007BFF;
        color: #fff;
        font-size: 28px;
        margin-bottom: 40px;
    }
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
    }
    input[type="text"], input[type="email"], select, textarea {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }
    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }
</style>
</head>
<body>
<header>
    業界の変革を支えるAIソリューションに関するアンケート
</header>

<form action="<?= $id ? 'update.php' : 'write.php' ?>" method="post">
    <?php if ($id): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <?php endif; ?>
    
    <!-- フォームの入力フィールド -->
    <label for="company_name">会社名:</label>
    <input type="text" name="company_name" id="company_name" value="<?= htmlspecialchars($data['company_name'] ?? '') ?>" required>

    <label for="mail">EMAIL:</label>
    <input type="email" name="mail" id="mail" value="<?= htmlspecialchars($data['email'] ?? '') ?>" required>

    <label for="industry">1. あなたの業種を教えてください。</label>
    <select name="industry" id="industry" required>
        <option value="小売業（洋服）" <?= (isset($data['industory']) && $data['industory'] == '小売業（洋服）') ? 'selected' : '' ?>>小売業（洋服）</option>
        <option value="ECプラットフォーム事業者" <?= (isset($data['industory']) && $data['industory'] == 'ECプラットフォーム事業者') ? 'selected' : '' ?>>ECプラットフォーム事業者</option>
        <option value="その他" <?= (isset($data['industory']) && $data['industory'] == 'その他') ? 'selected' : '' ?>>その他</option>
    </select>

    <label for="company_size">2. 会社の従業員数を教えてください。</label>
    <select name="company_size" id="company_size" required>
        <option value="1-10人" <?= (isset($data['company_size']) && $data['company_size'] == '1-10人') ? 'selected' : '' ?>>1-10人</option>
        <option value="11-50人" <?= (isset($data['company_size']) && $data['company_size'] == '11-50人') ? 'selected' : '' ?>>11-50人</option>
        <option value="51-100人" <?= (isset($data['company_size']) && $data['company_size'] == '51-100人') ? 'selected' : '' ?>>51-100人</option>
        <option value="101人以上" <?= (isset($data['company_size']) && $data['company_size'] == '101人以上') ? 'selected' : '' ?>>101人以上</option>
    </select>

    <label for="average_products">3. 1ヶ月あたりの平均商品取り扱い数を教えてください。</label>
    <select name="average_products" id="average_products" required>
        <option value="1-100件" <?= (isset($data['average_prpduts']) && $data['average_prpduts'] == '1-100件') ? 'selected' : '' ?>>1-100件</option>
        <option value="101-500件" <?= (isset($data['average_prpduts']) && $data['average_prpduts'] == '101-500件') ? 'selected' : '' ?>>101-500件</option>
        <option value="501-1000件" <?= (isset($data['average_prpduts']) && $data['average_prpduts'] == '501-1000件') ? 'selected' : '' ?>>501-1000件</option>
        <option value="1001件以上" <?= (isset($data['average_prpduts']) && $data['average_prpduts'] == '1001件以上') ? 'selected' : '' ?>>1001件以上</option>
    </select>

    <label for="inspection_method">4. 現在、検品作業はどのように行っていますか？</label>
    <select name="inspection_method" id="inspection_method" required>
        <option value="手作業" <?= (isset($data['inspection_method']) && $data['inspection_method'] == '手作業') ? 'selected' : '' ?>>手作業</option>
        <option value="部分的に自動化" <?= (isset($data['inspection_method']) && $data['inspection_method'] == '部分的に自動化') ? 'selected' : '' ?>>部分的に自動化</option>
        <option value="完全に自動化" <?= (isset($data['inspection_method']) && $data['inspection_method'] == '完全に自動化') ? 'selected' : '' ?>>完全に自動化</option>
        <option value="その他" <?= (isset($data['inspection_method']) && $data['inspection_method'] == 'その他') ? 'selected' : '' ?>>その他</option>
    </select>

    <label for="current_challenges">5. 検品において現在の課題を教えてください。（複数選択可）</label>
    <textarea name="current_challenges" id="current_challenges" rows="3"><?= htmlspecialchars($data['current_challenges'] ?? '') ?></textarea>

    <label for="interest">6. 検品作業の自動化について、興味はありますか？</label>
    <select name="interest" id="interest" required>
        <option value="非常に興味がある" <?= (isset($data['interest']) && $data['interest'] == '非常に興味がある') ? 'selected' : '' ?>>非常に興味がある</option>
        <option value="ある程度興味がある" <?= (isset($data['interest']) && $data['interest'] == 'ある程度興味がある') ? 'selected' : '' ?>>ある程度興味がある</option>
        <option value="あまり興味がない" <?= (isset($data['interest']) && $data['interest'] == 'あまり興味がない') ? 'selected' : '' ?>>あまり興味がない</option>
        <option value="全く興味がない" <?= (isset($data['interest']) && $data['interest'] == '全く興味がない') ? 'selected' : '' ?>>全く興味がない</option>
    </select>

    <label for="benefits">7. AI画像認識技術を用いた検品自動化アプリを導入することで、どのようなメリットを期待しますか？（複数選択可）</label>
    <textarea name="benefits" id="benefits" rows="3"><?= htmlspecialchars($data['benefits'] ?? '') ?></textarea>

    <label for="check_items">8. AI画像認識技術を利用した場合、どのような商品特性をチェックしたいですか？（複数選択可）</label>
    <textarea name="check_items" id="check_items" rows="3"><?= htmlspecialchars($data['check_items'] ?? '') ?></textarea>

    <label for="budget">9. AI技術を活用した検品アプリにどの程度の予算を見込んでいますか？</label>
    <select name="budget" id="budget" required>
        <option value="〜5万円" <?= (isset($data['budget']) && $data['budget'] == '〜5万円') ? 'selected' : '' ?>>〜5万円</option>
        <option value="5万円〜10万円" <?= (isset($data['budget']) && $data['budget'] == '5万円〜10万円') ? 'selected' : '' ?>>5万円〜10万円</option>
        <option value="10万円〜50万円" <?= (isset($data['budget']) && $data['budget'] == '10万円〜50万円') ? 'selected' : '' ?>>10万円〜50万円</option>
        <option value="50万円以上" <?= (isset($data['budget']) && $data['budget'] == '50万円以上') ? 'selected' : '' ?>>50万円以上</option>
    </select>

    <label for="adoption">10. AI画像認識技術を使用した検品自動化アプリが提供された場合、どの程度利用したいと思いますか？</label>
    <select name="adoption" id="adoption" required>
        <option value="すぐに利用したい" <?= (isset($data['adpption']) && $data['adpption'] == 'すぐに利用したい') ? 'selected' : '' ?>>すぐに利用したい</option>
        <option value="数ヶ月以内に導入を検討したい" <?= (isset($data['adpption']) && $data['adpption'] == '数ヶ月以内に導入を検討したい') ? 'selected' : '' ?>>数ヶ月以内に導入を検討したい</option>
        <option value="今は利用しないが、将来的に検討したい" <?= (isset($data['adpption']) && $data['adpption'] == '今は利用しないが、将来的に検討したい') ? 'selected' : '' ?>>今は利用しないが、将来的に検討したい</option>
        <option value="利用する予定はない" <?= (isset($data['adpption']) && $data['adpption'] == '利用する予定はない') ? 'selected' : '' ?>>利用する予定はない</option>
    </select>

    <label for="concerns">11. AI画像認識技術を用いた検品アプリの導入において、不安に感じる点を教えてください。</label>
    <textarea name="concerns" id="concerns" rows="3"><?= htmlspecialchars($data['concerns'] ?? '') ?></textarea>

    <label for="current_software">12. 検品作業の効率化のために、現在使用しているソフトウェアやツールがあれば教えてください。</label>
    <textarea name="current_software" id="current_software" rows="3"><?= htmlspecialchars($data['current_software'] ?? '') ?></textarea>

    <label for="support_needs">13. AI画像認識技術の導入に関して、サポートやトレーニングはどの程度必要だと感じますか？</label>
    <select name="support_needs" id="support_needs" required>
        <option value="まったく必要ない" <?= (isset($data['support_needs']) && $data['support_needs'] == 'まったく必要ない') ? 'selected' : '' ?>>まったく必要ない</option>
        <option value="ある程度必要" <?= (isset($data['support_needs']) && $data['support_needs'] == 'ある程度必要') ? 'selected' : '' ?>>ある程度必要</option>
        <option value="非常に必要" <?= (isset($data['support_needs']) && $data['support_needs'] == '非常に必要') ? 'selected' : '' ?>>非常に必要</option>
        <option value="わからない" <?= (isset($data['support_needs']) && $data['support_needs'] == 'わからない') ? 'selected' : '' ?>>わからない</option>
    </select>

    <label for="priority">14. このアプリの導入を検討する際、重要視するポイントを教えてください。（複数選択可）</label>
    <textarea name="priority" id="priority" rows="3"><?= htmlspecialchars($data['priority'] ?? '') ?></textarea>

    <input type="submit" value="送信">
</form>

</body>
</html>
