<?php
// メイン画像と透かし画像のパスを設定
$mainImagePath = 'main.jpg';
$watermarkPath = 'watermark.png';

// 画像を読み込む
$mainImage = imagecreatefromjpeg($mainImagePath);
$watermark = imagecreatefrompng($watermarkPath);

// サイズ取得
$mainWidth = imagesx($mainImage);
$mainHeight = imagesy($mainImage);

$watermarkWidth = imagesx($watermark);
$watermarkHeight = imagesy($watermark);

// 画像全体に透かしを敷き詰める
for ($y = 0; $y < $mainHeight; $y += $watermarkHeight) {
    for ($x = 0; $x < $mainWidth; $x += $watermarkWidth) {
        imagecopy($mainImage, $watermark, $x, $y, 0, 0, $watermarkWidth, $watermarkHeight);
    }
}

// 出力（ブラウザ表示）
header('Content-Type: image/jpeg');
imagejpeg($mainImage);

// メモリ解放
imagedestroy($mainImage);
imagedestroy($watermark);
?>
