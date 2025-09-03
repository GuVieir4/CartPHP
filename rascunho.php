<?php

# Rascunho do método de desconto
public function getDiscount(): float {
    if ($voucher == "DESCONTO10") {
        return $this->product->price * 0.9;
    } else {
        return "Cupom inválido, tente novamente!"
    }
}

Class Cart {
    private array $items = [];

    public function increaseItem(Product $product, int $quantity): int {
        return $this->product->stock + $this-$quantity
    }

    public function decreaseItem(Product $product, int $quantity): int {
        return $this->product->stock - $this-$quantity
    }

    public function removeItem(Product $product): string {
        foreach ($this-items )
    }

    public function includeItem(Product $product, int $quantity): string {
        foreach ($this->items as $item) {
            # vamo ver se o produto ja ta no carrinho, se ele não tiver a gnt adiciona
            if ($item->product->id === $product->id) {
                 $item->quantity += $quantity;
                 return "Quantidade do produto {$product->name} atualizada para {$item->quantity}.";
            }

            # agr se ele ainda n tiver no carrinho, tem que adicionar
        }
    }
}

class Product {                       #classe que define o comportamento de seus objetos usando métodos e modificando seus estados como atributos(modelo do produto)
    public int $id;
    public string $name;              #atributos da classe(atributos do produto)
    public float $price;
    public int $stock;

    public function __construct(int $id, string $name, float $price, int $stock)  #é chamado automaticamente sempre que um novo objeto da classe for criado
    {                                                                             #serve para inicializar os atributos do objeto quando ele for criado, em outras
        $this->id = $id;                                                          #em outras palavras ele define os valores iniciais dos atributos da classe no momento
        $this->name = $name;                                                      #em que um novo produto for criado.
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getProducts(array $products) {

    }
}

$produto1 = new Product(1, "Ryzen 5 5500", 500, 7);


?>