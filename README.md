# 🛒 Sistema de Carrinho de Compras em PHP

Este projeto é um exemplo simples de implementação de um **carrinho de
compras** em PHP orientado a objetos.  
Ele permite adicionar produtos, atualizar quantidades, calcular
subtotais e total da compra, além de aplicar descontos.

---

## 📂 Estrutura dos Arquivos

- **product.php** → Define a classe `Product`, que representa um
  produto da loja.
- **cartitem.php** → Define a classe `CartItem`, que representa um
  item do carrinho.
- **cart.php** → Define a classe `Cart`, que gerencia os itens do
  carrinho.
- **index.php** → Exemplo de uso das classes, simulando um carrinho de
  compras.

---

## 📦 Classes

### `Product` (product.php)

Representa um produto da loja.

**Atributos:**
- `int $id` → Identificador único do produto.  
- `string $name` → Nome do produto.  
- `float $price` → Preço unitário do produto.  
- `int $stock` → Quantidade disponível em estoque.

**Construtor:**
```php
new Product(int $id, string $name, float $price, int $stock)
```

---

### `CartItem` (cartitem.php)

Representa um item do carrinho (um produto com quantidade).

**Atributos:**
- `Product $product` → Produto adicionado.  
- `int $quantity` → Quantidade do produto.

**Métodos:**
- `getSubtotal(): float` → Retorna o subtotal (`price * quantity`).

---

### `Cart` (cart.php)

Gerencia os itens do carrinho.

**Atributos:**
- `array $items` → Lista de itens do carrinho (`CartItem`).

**Principais métodos:**
- `includeItem(Product $product, int $quantity): string` ➝ Adiciona um produto ao carrinho.  
- `increaseItem(Product $product, int $quantity): string` ➝ Aumenta a quantidade de um produto.  
- `decreaseItem(Product $product, int $quantity): string` ➝ Diminui a quantidade de um produto.  
- `updateQuantity(Product $product, int $quantityChange): string` ➝ Atualiza a quantidade de um produto.  
- `getItems(): array` ➝ Retorna todos os itens no carrinho.  
- `listItems(): string` ➝ Retorna uma listagem em texto dos itens e total do carrinho.  
- `calculateTotal(): float` ➝ Calcula o valor total da compra.  
- `applyDiscount(string $voucher): float` ➝ Aplica desconto com base em um cupom (`DESCONTO10` = 10%).  

---

## 🚀 Exemplo de Uso (index.php)

```php
require_once "product.php";
require_once "cartitem.php";
require_once "cart.php";

// Criando produtos
$produto1 = new Product(1, "Ryzen 5 5500", 500.0, 10);
$produto2 = new Product(2, "Placa-Mãe B450M", 400.0, 5);
$produto3 = new Product(3, "Memória RAM 16GB", 250.0, 20);

// Criando carrinho
$cart = new Cart();

// Adicionando itens
$cart->includeItem($produto1, 2);
$cart->includeItem($produto2, 1);
$cart->includeItem($produto3, 3);

// Exibindo itens
echo "<h3>Itens no carrinho:</h3>";
foreach ($cart->getItems() as $item) {
    echo "{$item->quantity} {$item->product->name} <br>";
}

// Exibir listagem detalhada
echo $cart->listItems();

// Exemplo de desconto
echo "<br>Total com desconto: R$ " . number_format($cart->applyDiscount("DESCONTO10"), 2, ',', '.');
```

---

## 📝 Saída Esperada

```html
Itens no carrinho:
2 Ryzen 5 5500
1 Placa-Mãe B450M
3 Memória RAM 16GB

Produtos no carrinho
- Ryzen 5 5500 | Quantidade: 2 | Subtotal: R$ 1.000,00
- Placa-Mãe B450M | Quantidade: 1 | Subtotal: R$ 400,00
- Memória RAM 16GB | Quantidade: 3 | Subtotal: R$ 750,00
Total: R$ 2.150,00

Total com desconto: R$ 1.935,00
```

---

## ⚙️ Instruções de Execução (XAMPP)

1. **Instale o [XAMPP](https://www.apachefriends.org/)** em sua máquina.
3. Use o comando git clone ou faça o download do ZIP do projeto.
4. Salve a pasta do projeto em xampp -> htdocs.
   ```
   C:\xampp\htdocs\cartphp
   ```
6. Inicie o **Apache** pelo painel do XAMPP.
7. Acesse o projeto no navegador pelo endereço:
   
   ```
   http://localhost/cartphp/index.php
   ```
9. O sistema exibirá a listagem dos produtos adicionados ao carrinho e o total calculado.

## 👥 Participantes

- André Luis da Silva Reis (RA: 1987363)
- Gustavo Henrique Vieira da Silva (RA: 1992080)

