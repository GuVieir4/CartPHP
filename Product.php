<?php

Class Product{                       #classe que define o comportamento de seus objetos usando métodos e modificando seus estados como atributos
    public int $id;
    public string $name;              #atributos da classe
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



?>