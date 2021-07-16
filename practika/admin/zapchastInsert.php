<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Добавление</title>
</head>

<body>
<header>
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
    <h2>Добавление запчасти</h2>
    <form method="post">
        <!-- <input type="text" name="id_zapchasti" placeholder="код запчасти"> -->
        <input type="text" name="zapchast_name" placeholder="Название запчасти">
        <input type="text" name="id_firmi" placeholder="Код фирмы">
        <input type="text" name="id_marka" placeholder="Код марки">
        <input type="text" name="id_uzla" placeholder="Код узла">
        <br>
        <input type="text" name="id_agragata" placeholder="Код агрегата">
        <input type="text" name="Price" placeholder="цена">
        <input type="text" name="kolichestvo" placeholder="количество">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="file" class="form-control" name="zapchast_img" accept=".jpg, .jpeg, .png" id="picture">
        <p><input type="submit" value="Добавить"></p>
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
// @$id_zapchasti = $_POST['id_zapchasti'];
@$zapchast_name = $_POST['zapchast_name'];
@$id_firmi = $_POST['id_firmi'];
@$id_marka = $_POST['id_marka'];
@$id_uzla = $_POST['id_uzla'];
@$id_agragata = $_POST['id_agragata'];
@$Price = $_POST['Price'];
@$kolichestvo = $_POST['kolichestvo'];
@$zapchast_img = $_POST['zapchast_img'];


if ( !$zapchast_name || !$id_firmi || !$id_marka || !$id_uzla || !$id_agragata || !$Price || !$kolichestvo || !$zapchast_img) {
    echo 'Вы ввели не все данные.';
    exit();
}
$query = "INSERT INTO spares (zapchast_name, id_firmi, id_marka, id_uzla, id_agragata, Price, kolichestvo,zapchast_img)
    values ('$zapchast_name', '$id_firmi', '$id_marka', '$id_uzla', '$id_agragata', '$Price', '$kolichestvo', '$zapchast_img')";
$result = mysqli_query($connect, $query);
if ($result) {
    echo "Новый сотрудник успешно добавлен";
}
?>