<?php
session_start();
require_once __DIR__ . '/db/db.php';

// получим все товары
$products = $connect->query('SELECT * FROM products')
                    ->fetchAll(PDO::FETCH_ASSOC);
$cats = $connect->query('SELECT cat FROM cats')
        ->fetchAll(PDO::FETCH_ASSOC);
$colors = $connect->query('SELECT color FROM colors')
        ->fetchAll(PDO::FETCH_ASSOC);
$weights = $connect->query('SELECT weight FROM weights')
        ->fetchAll(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ajax filters</title>
</head>
<body>
<div class="page">
    <div class="container">
            <div class="select">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cat">Выберите категорию</label>
                            <select class="form-control" name="cat" id="cat">
                                <option value="all">Все категории</option>
                                <?php foreach ($cats as $cat)  { ?>
                                    <option value="<?php echo $cat['cat']; ?>" <?php if($_SESSION['cat'] == $cat['cat'] ) { echo 'selected'; } ?>><?php echo $cat['cat']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="color">Выберите цвет</label>
                            <select class="form-control" name="color" id="color">
                                <option value="all">Все цвета</option>
                                <?php foreach ($colors as $color)  { ?>
                                    <option value="<?php echo $color['color']; ?>" <?php if($_SESSION['color'] == $color['color'] ) { echo 'selected'; } ?>><?php echo $color['color']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="weight">Выберите вес</label>
                            <select class="form-control" name="weight" id="weight">
                                <option value="all">Любой вес</option>
                                <?php foreach ($weights as $weight)  { ?>
                                    <option value="<?php echo $weight['weight']; ?>" <?php if($_SESSION['weight'] == $weight['weight'] ) { echo 'selected'; } ?>><?php echo $weight['weight']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row card-wrapper">
            <?php
              require_once __DIR__ . '/actions/query.php';
            ?>
        </div>
    </div>
</div>
<script src="./js/jquery.min.js"></script>
<script src="./js/main.js"></script>
</body>
</html>
