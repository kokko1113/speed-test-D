<?php
function rgbToHex($red, $green, $blue)
{
    $hexR = str_pad(dechex($red), 2, "0", STR_PAD_LEFT);
    $hexG = str_pad(dechex($green), 2, "0", STR_PAD_LEFT);
    $hexB = str_pad(dechex($blue), 2, "0", STR_PAD_LEFT);
    return $hexR . $hexG . $hexB;
}
if (isset($_GET["red"]) && isset($_GET["green"]) && isset($_GET["blue"])) {
    $red = $_GET["red"];
    $green = $_GET["green"];
    $blue = $_GET["blue"];
    $hex = rgbToHex($red, $green, $blue);
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
        R:<input type="number" max="255" min="0" name="red">
        G:<input type="number" max="255" min="0" name="green">
        B:<input type="number" max="255" min="0" name="blue">
        <button>変換</button>
    </form>
    <?php if (isset($hex)): ?>
        <?php echo "#" . $hex; ?>
    <?php endif; ?>
</body>

</html>