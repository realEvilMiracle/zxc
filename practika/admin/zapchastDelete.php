<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Удаление</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Админ. панель</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.html">Заказы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zapchastInsert.php">Добавить запчасти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zapchastDelete.php">Удалить запчасти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zapchastUpdate.php">Изменить запчасти</a>
                        </li>
                    </ul>
                    <form action="../index.html" class="d-flex">
                        <button class="btn btn-dark rounded" type="submit">Выйти</button>
                    </form>
                </div>
            </div>
        </nav>
    <h2>Удаление сотрудников</h2>
    <form method="post">
        <p>Выберите сотрудника, которого необходимо удалить: <select name="spares">
                <?php
                $par1_ip = "localhost";
                $par2_name = "root";
                $par3_p = "";
                $par4_db = "zxc";
                
                $connect = mysqli_connect($par1_ip,$par2_name,$par3_p,$par4_db);
                
                if ($connect == false)
                {
                    echo "Ошибка подключения!";
                }
                
                mysqli_query($connect, "SET NAMES utf8");
                $query = "select * from spares";
                $result = mysqli_query($connect, $query);
                foreach ($result as $arr) {
                    echo "<option value='{$arr['id_zapchasti']}'>{$arr['zapchast_name']} {$arr['id_firmi']} {$arr['id_marka']} {$arr['id_uzla']} {$arr['id_agragata']} {$arr['Price']} {$arr['kolichestvo']} {$arr['zapchast_img']}</option>";
                }
                ?>
            </select></p>
        <input type="submit" value="Удалить">
    </form>
</body>

</html>
<?php
$par1_ip = "localhost";
$par2_name = "root";
$par3_p = "";
$par4_db = "zxc";

$connect = mysqli_connect($par1_ip,$par2_name,$par3_p,$par4_db);

if ($connect == false)
{
    echo "Ошибка подключения!";
}

mysqli_query($connect, "SET NAMES utf8");

if (isset($_POST['spares'])) {
    $id = $_POST['spares'];
    $query = "delete from spares where id_zapchasti = {$id}";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "Успешно удалено";
    } else {
        echo "Произошла ошибка";
    }
}
?>