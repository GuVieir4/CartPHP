<?php

class Product{                       #classe que define o comportamento de seus objetos usando métodos e modificando seus estados como atributos(modelo do produto)
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
}

class CartItem{                                                                   #Classe para representar um item(produto)do carrinho de compras e sua quantidade
    public Product $product;
    public int $quantity;

    public function __construct(Product $product, int $quantity)                 #construtor do produto no carrinho
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getSubtotal(): float                                         #metodo para fazer o calculo automatico do subtotal do item
    {
        return $this->product->price * $this->quantity;                          #pega o preço do produto e multiplica pela sua quantidade  
    }
}

class Cart{
    private array $items = [];

    public function includeItem(Product $product, int $quantity): string
    {
        
    }
    
}


?>