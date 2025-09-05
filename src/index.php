<?php

declare(strict_types=1);

require_once "product.php";
require_once "cartitem.php";
require_once "cart.php";

$product1 = new Product(1, "Ryzen 5 5500", 500.0, 10);
$product2 = new Product(2, "Placa-Mãe B450M", 400.0, 5);
$product3 = new Product(3, "Memória RAM 16GB", 250.0, 20);

$cart = new Cart();

echo "<h3>Adicionando produto no carrinho.</h3>";
echo $cart->includeItem($product1, 2);
echo "Estoque restante do produto {$product1->name}: {$product1->stock}<br>";
echo "<hr>";

echo "<h3>Adicionando produto no carrinho além do estoque disponivel.</h3>";
echo $cart->includeItem($product2, 7);
echo "Estoque disponivel do produto {$product2->name}: {$product2->stock}<br>";
echo "<hr>";

echo "<h3>Removendo produto do carrinho.</h3>";
echo $cart->includeItem($product3, 10);
echo $cart->decreaseItem($product3, 10);
echo "Estoque produto {$product3->name}: {$product3->stock}<br>";
echo "<hr>";

echo "<h3>Aplicando cupom de desconto.</h3>";
echo $cart->includeItem($product3, 15);
echo $cart->listItems() . "<br>";

$totalComDesconto = $cart->applyDiscount("DESCONTO10");
echo "Total com desconto aplicado: R$" . number_format($totalComDesconto, 2, ',', '.') . "<br>";
echo "<hr>";

echo "<h3>Itens no carrinho:</h3>";
foreach ($cart->getItems() as $item) {
    echo "{$item->quantity} {$item->product->name} <br>";
}


echo $cart->listItems();
