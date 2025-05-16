<?php
$limit = $_GET["limit"];
$price = $_GET["price"];
$category = $_GET["category"];
$dsn = "mysql:host=mariadb;dbname=php-dev;charset=utf8mb4";
$pass = "root";
$user = "root";
try {
    $pdo = new PDO($dsn, $user, $pass); //dsn,user,passの順番でぶち込む
    $originalCategory = $pdo->query("SELECT category FROM uses");
    $categories = [];
    foreach ($originalCategory as $data) {
        array_push($categories, $data[0]);
    }
    $categories = array_unique($categories);
    $arr = "";
    if ($category && $price) {
        $arr = "WHERE category = ' :category ' AND price :price";
    } else if ($category) {
        $arr = "WHERE category = ' :category '"; //文字列はシングルコーテーション忘れずに!
    } else if ($price) {
        $arr = "WHERE price :price";
    }
    // $prepare = $pdo->prepare('SELECT * FROM users WHERE id = :id;');
    
    $stmt = $pdo->prepare("SELECT * FROM uses " . $arr);
    if($category){
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    }
    if($price){
        $stmt->bindValue(':price',  $limit . $price, PDO::PARAM_STR);
    }
    $stmt->execute();

} catch (PDOException $e) {
    echo "error";
    echo $e->getMessage();
    exit();
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
    <form action="" method="get">
        <select name="category" id="">
            <option value="">選択なし</option>
            <?php foreach ($categories as $cate): ?>
                <option value="<?php echo $cate ?>"><?php echo $cate ?></option>
            <?php endforeach; ?>
        </select>

        <select name="limit" id="">
            <option value="<=">上限</option>
            <option value=">=">下限</option>
        </select>
        <input type="number" name="price">
        <button>絞り込み</button>
    </form>


    <?php foreach ($stmt as $data): ?>
        <td><?php echo $data["id"] . $data["name"] . $data["price"] ?></td>
        <br>
    <?php endforeach; ?>
</body>

</html>