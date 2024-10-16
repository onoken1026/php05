<?php
require 'db_connect.php';  // データベース接続

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->execute();

        echo "ユーザー登録が完了しました！";
    } catch (PDOException $e) {
        echo '登録エラー: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
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
            font-size: 22px; /* フォントサイズを少し小さく調整 */
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
        input[type="text"], input[type="password"] {
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
    業界の変革を支えるAIソリューションに関するアンケート<br>
    <span style="font-size: 18px;">ー新規ユーザー登録ー</span> <!-- テキストサイズを小さく、改行追加 -->
</header>

<form action="register.php" method="post">
    <label for="username">ユーザー名:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">パスワード:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" value="登録">
</form>

</body>
</html>
