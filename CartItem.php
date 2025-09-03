<?php

class CartItem {
    public Product $product;
    public int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getSubtotal(): float 
    {
        return $this->product->price * $this->quantity;
    }
}

?>