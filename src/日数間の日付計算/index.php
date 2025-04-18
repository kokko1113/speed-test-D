<?php
if(isset($_GET["date1"])&&isset($_GET["date2"])){
    $date1 = $_GET["date1"];
    $date2 = $_GET["date2"];
    $day1 = new DateTime($date1);
    $day2 = new DateTime($date2);
    $int = $day1->diff($day2)->days;
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
    <?php if (isset($int)): ?>
        <?php echo $int."日"; ?>
    <?php endif; ?>
</body>

</html>