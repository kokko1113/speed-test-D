<?php
if (!isset($_GET["name"])) {
    $message = "名前を入力してください";
} else if (strpos($_GET["mail"], "@") === false) {
    $message = "無効な形式のメールアドレスです";
}else if(!is_numeric($_GET["number"])||$_GET["number"]<1||$_GET["number"]>10){
    $message="数字は1~10の間の整数を入力してください";
}else{
    $message="送信が完了しました";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="." method="get">
        Name:<input type="text" name="name" id="">
        Mail:<input type="text" name="mail" id="">
        Number:<input type="text" name="number" id="">
        <button>送信</button>
    </form>

    <?php if (isset($message)): ?>
        <?php echo $message; ?>
    <?php endif; ?>
</body>

</html>