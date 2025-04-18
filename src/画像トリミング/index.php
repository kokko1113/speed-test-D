<?php
$uploadedImage = '';
$croppedImage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // アップロード処理
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES['image']['name']);
        $targetPath = 'uploads/' . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
        $uploadedImage = $targetPath;
    }

    // 切り抜き処理
    if (isset($_POST['crop']) && isset($_POST['x']) && isset($_POST['y']) && isset($_POST['width']) && isset($_POST['height'])) {
        $srcPath = $_POST['image_path'];
        $imgInfo = getimagesize($srcPath);
        $ext = image_type_to_extension($imgInfo[2]);
        $createFunc = [
            '.jpg' => 'imagecreatefromjpeg',
            '.jpeg' => 'imagecreatefromjpeg',
            '.png' => 'imagecreatefrompng',
            '.gif' => 'imagecreatefromgif'
        ];

        $extLower = strtolower($ext);
        if (isset($createFunc[$extLower])) {
            $srcImage = $createFunc[$extLower]($srcPath);

            $x = (int)$_POST['x'];
            $y = (int)$_POST['y'];
            $width = (int)$_POST['width'];
            $height = (int)$_POST['height'];

            $dstImage = imagecreatetruecolor($width, $height);
            imagecopy($dstImage, $srcImage, 0, 0, $x, $y, $width, $height);

            $cropName = 'cropped/crop-' . basename($srcPath);
            imagejpeg($dstImage, $cropName);
            imagedestroy($dstImage);
            imagedestroy($srcImage);

            $croppedImage = $cropName;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>画像アップロード＆切り抜き</title>
    <style>
        form { margin-bottom: 20px; }
        img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1>画像アップロード＆切り抜き</h1>

    <?php if (empty($uploadedImage) && empty($croppedImage)) : ?>
        <form method="post" enctype="multipart/form-data">
            <label>画像をアップロード:</label><br>
            <input type="file" name="image" required><br><br>
            <input type="submit" value="アップロード">
        </form>
    <?php endif; ?>

    <?php if ($uploadedImage && empty($croppedImage)) : ?>
        <h2>アップロードされた画像</h2>
        <img src="<?= htmlspecialchars($uploadedImage) ?>" alt="Uploaded Image"><br><br>

        <form method="post">
            <input type="hidden" name="image_path" value="<?= htmlspecialchars($uploadedImage) ?>">
            <label>X座標: <input type="number" name="x" required></label><br>
            <label>Y座標: <input type="number" name="y" required></label><br>
            <label>幅: <input type="number" name="width" required></label><br>
            <label>高さ: <input type="number" name="height" required></label><br><br>
            <input type="submit" name="crop" value="切り抜く">
        </form>
    <?php endif; ?>

    <?php if ($croppedImage) : ?>
        <h2>切り抜き完了</h2>
        <img src="<?= htmlspecialchars($croppedImage) ?>" alt="Cropped Image"><br><br>
        <a href="<?= htmlspecialchars($croppedImage) ?>" download>ダウンロード</a>
    <?php endif; ?>
</body>
</html>
