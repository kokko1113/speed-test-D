<?php
$limit = $_GET["limit"] ?? null;
$price = $_GET["price"] ?? null;
$category = $_GET["category"] ?? null;

$dsn = "mysql:host=mariadb;dbname=php-dev;charset=utf8mb4";
$pass = "root";
$user = "root";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $originalCategory = $pdo->query("SELECT DISTINCT category FROM uses");
    $categories = [];
    foreach ($originalCategory as $data) {
        $categories[] = $data['category'];
    }

    // 動的にSQLクエリ構築
    $conditions = [];
    $params = [];

    if (!empty($category)) {
        $conditions[] = "category = :category";
        $params[':category'] = $category;
    }

    if (!empty($price) && in_array($limit, ['<=', '>='])) {
        $conditions[] = "price {$limit} :price";
        $params[':price'] = $price;
    }

    $sql = "SELECT * FROM uses";
    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $pdo->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value, is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }

    $stmt->execute();

} catch (PDOException $e) {
    echo "error";
    echo $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>絞り込み検索</title>
</head>

<body>
    <form action="" method="get">
        <select name="category">
            <option value="">選択なし</option>
            <?php foreach ($categories as $cate): ?>
                <option value="<?php echo htmlspecialchars($cate) ?>" <?php if ($cate == $category) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($cate) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="limit">
            <option value="<=" <?php if ($limit == '<=') echo 'selected'; ?>>上限</option>
            <option value=">=" <?php if ($limit == '>=') echo 'selected'; ?>>下限</option>
        </select>
        <input type="number" name="price" value="<?php echo htmlspecialchars($price) ?>">
        <button type="submit">絞り込み</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>価格</th>
        </tr>
        <?php foreach ($stmt as $data): ?>
            <tr>
                <td><?php echo htmlspecialchars($data["id"]) ?></td>
                <td><?php echo htmlspecialchars($data["name"]) ?></td>
                <td><?php echo htmlspecialchars($data["price"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
