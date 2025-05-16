<?php 
$dsn="mysql:host=mariadb;dbname=php-dev;charset=utf8mb4";
$user="root";
$pass="root";
$limit=$_GET["limit"];
$price=$_GET["price"];
$category=$_GET["category"];
try{
    $pdo=new PDO($dsn,$user,$pass);
    $arr=[];
    $params=[];
    if($category){
        $arr[]="category =  :category";
        $params['category']=$category;
    }
    if($price){
        $arr[]="price $limit :price";
        $params['price']=$price;
    }
    $sql="SELECT * FROM uses";
    if(!empty($arr)){
        $sql.=" WHERE ".implode(" AND ",$arr);
    }
    $stmt=$pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key,$value,is_numeric($value)?PDO::PARAM_INT:PDO::PARAM_STR);
    }
    $stmt->execute();
}catch(PDOException $e){
    echo "error";
    echo $e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>C5</title>
</head>

<body>
    <table border="1">
        <?php foreach ($stmt as $data): ?>
            <tr>
                <td><?php echo $data["id"] . $data["name"] . $data["price"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>