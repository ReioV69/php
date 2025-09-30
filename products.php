<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KT</title>
</head>
<body>
    
</body>
</html>

<?php
$products = [];
if (($handle = fopen("products.csv", "r")) !== FALSE) {
    $header = fgetcsv($handle); // loeb päise: Nimi,Hind,Energiakulu kWh
    while (($data = fgetcsv($handle)) !== FALSE) {
        $products[] = array_combine($header, $data);
    }
    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid products productList overflow-hidden">
    <div class="container products-mini py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h4 class="text-primary border-bottom border-primary border-2 d-inline-block p-2 title-border-radius">
                Products
            </h4>
            <h1 class="mb-0 display-3">All Product Items</h1>
        </div>
        <div class="productList-carousel owl-carousel pt-4">
            <?php foreach ($products as $p): ?>
                <div class="productImg-item products-mini-item border">
                    <div class="row g-0">
                        <div class="col-5">
                            <div class="products-mini-img border-end h-100">
                                <img src="img/default-product.png" class="img-fluid w-100 h-100"
                                     alt="<?= htmlspecialchars($p['Nimi']) ?>">
                                <div class="products-mini-icon rounded-circle bg-primary">
                                    <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="products-mini-content p-3">
                                <a href="#" class="d-block mb-2">Toode</a>
                                <a href="#" class="d-block h4"><?= htmlspecialchars($p['Nimi']) ?></a>
                                <span class="text-primary fs-5">€<?= htmlspecialchars($p['Hind']) ?></span><br>
                                <small>Energiakulu: <?= htmlspecialchars($p['Energiakulu kWh']) ?> kWh</small>
                            </div>
                        </div>
                    </div>
                    <div class="products-mini-add border p-3">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4">
                            <i class="fas fa-shopping-cart me-2"></i> Lisa korvi
                        </a>
                        <div class="d-flex">
                            <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3">
                                <span class="rounded-circle btn-sm-square border">
                                    <i class="fas fa-random"></i>
                                </span>
                            </a>
                            <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0">
                                <span class="rounded-circle btn-sm-square border">
                                    <i class="fas fa-heart"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>
