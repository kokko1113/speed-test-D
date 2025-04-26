<?php
$password = $_GET["text"];
$strength = 0;

// 長さチェック
if (strlen($password) < 8) {
    $message = "非常に弱い（パスワードは8文字以上である必要があります）";
} else {
    // 各条件をチェック
    if (preg_match('/[a-z]/', $password)) $strength++; // 小文字
    if (preg_match('/[A-Z]/', $password)) $strength++; // 大文字
    if (preg_match('/[0-9]/', $password)) $strength++; // 数字
    if (preg_match('/[\W_]/', $password)) $strength++; // 特殊文字（記号）

    // 強度レベルを判定
    switch ($strength) {
        case 0:
        case 1:
            $message = "弱い";
            break;
        case 2:
            $message = "中程度";
            break;
        case 3:
            $message = "強い";
            break;
        case 4:
            $message = "非常に強い";
            break;
    }
}

echo $message;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="text" placeholder="pass">
        <button>Send</button>
    </form>
</body>

</html>