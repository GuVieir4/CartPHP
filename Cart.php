<?php

Class Cart {
    private array $items = [];

    public function increaseItem(Product $product, int $quantity): string {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]->quantity += $quantity;
            return "A quantidade do produto {$product->name} foi aumentada do carrinho.";
        }

        return "Produto não está no carrinho";
    }

    public function decreaseItem(Product $product, int $quantity): string {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]->quantity -= $quantity;
            return "A quantidade do produto {$product->name} foi diminuída do carrinho.";
        }
    }

    public function includeItem(Product $product, int $quantity): string {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]->quantity += $quantity;
            return "Quantidade do produto {$product->name} atualizada para {$this->items[$product->id]->quantity}.";
        }

        $this->items[$product->id] = new CartItem($product, $quantity);
        return "Produto {$product->name} adicionado ao carrinho.";

    }

    public function getItems(): array {
        return $this->items;
    }
}

?>