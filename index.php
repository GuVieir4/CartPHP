<?php

require_once "product.php";
require_once "cartitem.php";
require_once "cart.php";

$produto1 = new Product(1, "Ryzen 5 5500", 500.0, 10);
$produto2 = new Product(2, "Placa-Mãe B450M", 400.0, 5);
$produto3 = new Product(3, "Memória RAM 16GB", 250.0, 20);

$cart = new Cart();

$cart->includeItem($produto1, 2);
$cart->includeItem($produto2, 1);
$cart->includeItem($produto3, 3);   

echo "<h3>Itens no carrinho:</h3>";
foreach ($cart->getItems() as $item) {
    echo "{$item->quantity} {$item->product->name} <br>";
}
echo $cart->listItems();
?>