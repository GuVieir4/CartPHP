<?php

class Cart
{
    private array $items = [];

    public function updateQuantity(Product $product, int $quantityChange): string
    {
        if (!isset($this->items[$product->id])) {
            return "O produto {$product->name} não está no carrinho.";
        }

        if ($quantityChange > 0 && $product->stock < $quantityChange) {
            return "Não há mais do {$product->name} no estoque.Disponivel: {$product->stock}";
        }

        $this->items[$product->id]->quantity += $quantityChange;

        if ($this->items[$product->id]->quantity <= 0) {
            $product->stock += $this->items[$product->id]->quantity + $quantityChange;
            unset($this->items[$product->id]);
            return "O Produto {$product->name} foi removido do carrinho.";
        }

        if ($quantityChange > 0) {
            $product->stock -= $quantityChange;
        } elseif ($quantityChange < 0) {
            $product->stock += abs($quantityChange);
        }

        return "A quantidade do produto {$product->name} no carrinho foi atualizada para {$this->items[$product->id]->quantity}.";
    }

    public function includeItem(Product $product, int $quantity): string
    {

        if ($product === null) {
            return "Esse produto não existe.";
        }

        if ($product->stock < $quantity) {
            return "Essa quantidade do {$product->name} é maior do que do que o disponivel no estoaque";
        }


        if (isset($this->items[$product->id])) {
            return $this->updateQuantity($product, $quantity);
        }

        $this->items[$product->id] = new CartItem($product, $quantity);
        $product->stock -= $quantity;
        return "O produto {$product->name} foi adicionado ao carrinho.";
    }
    public function increaseItem(Product $product, int $quantity): string
    {
        return $this->updateQuantity($product, $quantity);
    }

    public function decreaseItem(Product $product, int $quantity): string
    {
        return $this->updateQuantity($product, -$quantity);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function listItems(): string
    {
        if (empty($this->items)) {
            return "Não há nenhum produto no carrinho";
        }

        $output = "Produtos no carrinho";

        foreach ($this->items as $item) {
            $output .= "-{$item->product->name} | Quantidade: {$item->quantity} | Subtotal: R$ "
                . number_format($item->getSubtotal(), 2, ',', '.') . "|";
        }

        $total = $this->calculateTotal();
        $output .= "Total: R$ " . number_format($total, 2, ',', '.');

        return $output;
    }

    public function calculateTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    public function applyDiscount(string $voucher): float
    {
        $total = $this->calculateTotal();

        if ($voucher === "DESCONTO10") {
            return $total * 0.9;
        }

        return $total;
    }
}
