<?php
if (isset($_GET["str"])) {
    $str = $_GET["str"];
    $result=preg_replace("/[0-9]/","",$str);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <input type="text" name="str">
        <button>送信</button>
    </form>
    
    <?php if (isset($result)): ?>
        <?php echo $result; ?>
    <?php endif; ?>
</body>

</html>