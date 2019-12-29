<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: logout.php");
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="list.php">投稿一覧へ</a></li>
            <li><a href="toukouform.php">投稿画面へ</a></li>
            <li><a href="newindex.php">画像投稿＆一覧へ</a></li>
            <li><a href="logout.php">ログアウト</a></li>
        </ul>
    </body>
</html>