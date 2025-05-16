<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>C5</title>
</head>

<body>
    <form action="./search.php" method="get">
        <select name="category" id="">
            <option value="">none</option>
            <option value="fruit">fruit</option>
            <option value="stationary">stationary</option>
            <option value="clothes">clothes</option>
        </select>

        <select name="limit" id="">
            <option value="<=">上限</option>
            <option value=">=">下限</option>
        </select>
        <input type="number" name="price">
        
        <button>絞り込み</button>
    </form>
</body>

</html>