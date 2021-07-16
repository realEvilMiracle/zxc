<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Поиск</title>
</head>

<body>

    <h2>Поиск продукции</h2>
    <form method="post">
        <p>Выберите категорию: <select name="searchType">
                <option value="Поршень">Поршни</option>
                <option value="ШРУС">ШРУС</option>
                <option value="Кольца">Кольца</option>
                <option value="сцепления">Сцепление</option>
                <option value="Подшипник">Подшипники</option>
                <option value="Диски">Диски</option>
            </select></p>
        <p>Настройки цены:
            <select name="searchHaving">
                <option value=">">Больше</option>
                <option value="<">Меньше</option>
            </select>
            <input name="searchTerm" type="text" value="0">
        </p>
        <input type="submit" value="Найти">
    </form>
</body>

</html>
<?php
require 'includes/connection.php';
if (isset($_POST['searchType'])) {
    $sType = $_POST['searchType'];
    $sTerm = $_POST['searchTerm'];
    $sHaving = $_POST['searchHaving'];
    $query = "select * from spares where zapchast_name like '%{$sType}%' having Price {$sHaving} {$sTerm}";
    $result = mysqli_query($connect, $query);
    // echo "<table><tr><th>Наименование</th><th>Цена</th><th>Остаток</th></tr>";
    foreach ($result as $arr) {
        // echo "<tr><td>{$arr['zapchast_name']}</td><td>{$arr['Price']}<td>{$arr['kolichestvo']}</td></td></tr>";
        ?>
        <div class="col-md-4">
            <form method="post" action="zxc.php?action=add&id=<?php echo $arr["id_zapchasti"]; ?>">
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                            <img src="img/<?php echo $arr["zapchast_img"]; ?>" class="img-responsive" /><br />

                            <h4 class="text-info"><?php echo $arr["zapchast_name"]; ?></h4>

                            <h4 class="text-danger"><?php echo $arr["Price"]; ?> Рублей</h4>

                            <input type="text" name="quantity" value="1" class="form-control" />

                            <input type="hidden" name="hidden_name" value="<?php echo $arr["zapchast_name"]; ?>" />

                            <input type="hidden" name="hidden_price" value="<?php echo $arr["Price"]; ?>" />

                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Добавить в корзину" />

                        </div>
            </form>
        </div>
                <?php
    }
}
echo "</table>";
?>