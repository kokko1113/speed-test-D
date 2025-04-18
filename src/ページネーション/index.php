<?php
$dataArr = json_decode(file_get_contents("./data.json"));
//↓ページの数(1ページに10個ずつデータが表示される)
$dataNum = ceil(count($dataArr) / 10);
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
if ($page < 3) {
    $center = 3;
} else if ($page > $dataNum - 2) {
    $center = $dataNum - 2;
} else {
    $center = $page;
}
$before = max($page - 5, 1);
$after = min($page + 5, $dataNum)
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php for ($i = $page * 10 - 10; $i < $page * 10; $i++): ?>
        <?php echo $dataArr[$i]->name . "(" . $dataArr[$i]->age . ")"; ?>
        <br>
    <?php endfor; ?>

    <a href=<?php echo "?page=" . $before; ?>><<<</a>

    <a href=<?php echo "?page=" . $center - 2; ?>><?php echo $center - 2; ?></a>
    <a href=<?php echo "?page=" . $center - 1; ?>><?php echo $center - 1; ?></a>
    <a href=<?php echo "?page=" . $center; ?>><?php echo $center; ?></a>
    <a href=<?php echo "?page=" . $center + 1; ?>><?php echo $center + 1; ?></a>
    <a href=<?php echo "?page=" . $center + 2; ?>><?php echo $center + 2; ?></a>

    <a href=<?php echo "?page=" . $after; ?>>>>></a>
</body>

</html>