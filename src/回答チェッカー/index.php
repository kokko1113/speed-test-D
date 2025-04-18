<?php
$csvA = fopen("./a.csv", "r");
$a = [];
while (($data = fgetcsv($csvA)) !== false) {
    array_push($a, $data);
}
$csvB = fopen("./b.csv", "r");
$b = [];
while (($data = fgetcsv($csvB)) !== false) {
    array_push($b, $data);
}

$count = 0
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th></th>
            <th>解答</th>
            <th>回答</th>
        </tr>
        <?php for ($i = 0; $i < count($a); $i++): ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $a[$i][0]; ?></td>
                <td><?php echo $b[$i][0]; ?></td>
            </tr>
            <?php if ($a[$i][0] === $b[$i][0]): ?>
                <?php $count++; ?>
            <?php endif; ?>
        <?php endfor; ?>
    </table>
    <p>
        <?php echo "正解数:".$count."/10";?>
    </p>
</body>

</html>