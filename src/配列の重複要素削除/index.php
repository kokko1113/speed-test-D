<?php
$arr=[1,1,2,3,4,3,5,4,4,3];
$result=array_unique($arr);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($result as $data): ?>
        <?php echo $data; ?>
    <?php endforeach; ?>
</body>

</html>