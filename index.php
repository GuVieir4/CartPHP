<?php

require_once "product.php";
require_once "cartitem.php";
require_once "cart.php";

$produto1 = new Product(1, "Ryzen 5 5500", 500.0, 10);
$produto2 = new Product(2, "Placa-Mãe B450M", 400.0, 5);
$produto3 = new Product(3, "Memória RAM 16GB", 250.0, 20);

$carrinho = new Cart();

$carrinho->includeItem($produto1, 2);
$carrinho->includeItem($produto2, 1);
$carrinho->includeItem($produto3, 3);   

echo "<h3>Itens no carrinho:</h3>";
foreach ($carrinho->getItems() as $item) {
    echo "{$item->quantity} {$item->product->name} <br>";
}

?>