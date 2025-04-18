<?php
// メイン画像と透かし画像のパスを設定
$mainImagePath = 'image.png';      // 透かしを追加したい元画像
$watermarkPath = 'watermark.png'; // 透かし画像（透過PNGが理想）

// 画像を読み込む（JPEGとPNG）
$mainImage = imagecreatefrompng($mainImagePath);
$watermark = imagecreatefrompng($watermarkPath);

// 元画像と透かしのサイズを取得
$mainWidth = imagesx($mainImage);
$mainHeight = imagesy($mainImage);

$watermarkWidth = imagesx($watermark);
$watermarkHeight = imagesy($watermark);

// 透かしの表示位置を決定（右下に配置）
$destX = $mainWidth - $watermarkWidth ; 
$destY = $mainHeight - $watermarkHeight ;

// imagecopyで透かし画像を元画像に重ねる
imagecopy($mainImage, $watermark, $destX, $destY, 0, 0, $watermarkWidth, $watermarkHeight);

// ヘッダーを設定して画像を出力（ブラウザに表示する場合）
header('Content-Type: image/jpeg');
imagejpeg($mainImage);

// メモリ解放
imagedestroy($mainImage);
imagedestroy($watermark);
?>
