<?php
$img = imagecreatefrompng("./image.png");
$width = imagesx($img);
$height = imagesy($img);
$colors = [];
for ($x = 0; $x < $width; $x++) {
    for ($y = 0; $y < $height; $y++) {
        $rgb = imagecolorat($img, $x, $y);
        $color = imagecolorsforindex($img, $rgb);
        $red = $color["red"];
        $green = $color["green"];
        $blue = $color["blue"];
        $arrKey = $red . "," . $green . "," . $blue;
        if (isset($colors[$arrKey])) {
            $colors[$arrKey]++;
        } else {
            $colors[$arrKey] = 1;
        }
    }
}
arsort($colors);
$topArr = array_slice($colors, 0, 3);
$one = key(array_slice($topArr, 0, 1));
$two = key(array_slice($topArr, 1, 1));
$three = key(array_slice($topArr, 2, 1));
list($r1, $g1, $b1) = explode(",", $one);
list($r2, $g2, $b2) = explode(",", $two);
list($r3, $g3, $b3) = explode(",", $three);
echo "1番目:rgb(" . $r1 . "," . $g1 . "," . $b1 . ")";
echo "2番目:rgb(" . $r2 . "," . $g2 . "," . $b2 . ")";
echo "3番目:rgb(" . $r3 . "," . $g3 . "," . $b3 . ")";
?>