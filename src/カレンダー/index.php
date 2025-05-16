<?php
$arr = [];
$year = 2025;
$month = 4;
$week = ["月", "火", "水", "木", "金", "土", "日"];
$end = date("t", strtotime("$year-$month-01"));
$first = date("w", strtotime("$year-$month-01"));
$last = date("w", strtotime("$year-$month-$end"));
$firstDiff = ($first + 6) % 7;
$lastDiff = 6 - (($last + 6) % 7);
for ($i = 1; $i <= $end; $i++) {
    array_push($arr, $i);
}
for ($i = 0; $i < $firstDiff; $i++) {
    array_unshift($arr, "");
}
for ($i = 0; $i < $lastDiff; $i++) {
    array_push($arr, "");
}
for ($i = count($week) - 1; $i >= 0; $i--) {
    array_unshift($arr, $week[$i]);
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
    <table>
        <?php for ($i = 0; $i < count($arr); $i++): ?>
            <?php if ($i % 7 === 0): ?>
                <tr>
            <?php endif; ?>

            <td>
                <?php echo $arr[$i];?>
            </td>

            <?php if ($i % 7 === 6): ?>
                </tr>
            <?php endif; ?>
        <?php endfor; ?>
    </table>
</body>
</htm
