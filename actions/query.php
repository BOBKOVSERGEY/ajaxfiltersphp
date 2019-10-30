<?php

if (count($_GET) > 0) {
    session_start();
    require_once __DIR__ . '/../db/db.php';

    $data = $_GET;
    foreach ($data as $key=>$value) {
        $currentKey = $key;
        $currentValue = $value;
    }

    $_SESSION[$currentKey] = $currentValue;
}



$query = 'SELECT * FROM products WHERE';

foreach ($_SESSION as $key => $value) {
    if ($value != 'all') {
$query .= " $key='$value' AND";
    }
}

$query = trim($query, ' WHERE');
$query = trim($query, ' AND');


$products = $connect->query($query)
                    ->fetchAll(PDO::FETCH_ASSOC);

if (!$products) {
    echo '<h2>Товаров не найдено!</h2>';
}

foreach ($products as $product) { ?>
    <div class="col-3">
        <div class="card p-3 mb-3">
            <h2 class="card-title"><?php echo $product['title']; ?></h2>
            <div class="card-body"></div>
            <p class="lead">Цвет: <?php echo $product['color']; ?></p>
            <p class="lead">Вес: <?php echo $product['weight']; ?></p>
        </div>
    </div>
<?php } ?>
