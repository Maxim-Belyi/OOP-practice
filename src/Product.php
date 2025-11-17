<?php

class Product {

    public static $taxRate = 0.2;
    public static $productCreated = 0;
    public $name;
    public $price;
    public $sku;

    public static function generateSku($productName)
    {
        $prefix = "PROD-";
        $hash = substr(strtoupper(md5($prefix . $productName)), 0, 8);
        return $prefix . $hash;
    }

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->sku = self::generateSku($name);

        self::$productCreated++;
        echo "Создан товар '{$this->name}' <br>";
        echo "Артикул {$this->sku}";
    }

    public function getPriceWithTax()
    {
        $this->price;
        self::$taxRate;
        $taxAmount = $this->price * self::$taxRate;
        return $this->price + $taxAmount;
    }

    public static function setGlobalTaxRate($newRate)
    {
        self::$taxRate = $newRate / 100;
        echo "______________________________________<br> <br>";
        echo "Внимание: Ставка НДС изменена на " . ($newRate) . "%<br> <br>";
        echo "______________________________________<br>";
    }

}

echo "Начальная ставка НДС " . (Product::$taxRate * 100) . "%<br>";
echo "Товаров в каталоге: " . (Product::$productCreated) . "<br>";

$laptopLenovo = new Product("Lenovo pro max super", 15600);
echo "<br>";
$mouse = new Product("Беспроводная мышь", 600);
echo "<br>";

echo "Товаров в каталоге после добавления: " . Product::$productCreated . "<br>";

echo "Цена ноутбука без НДС: " . $laptopLenovo->price;
echo "<br>";
echo "Цена мыши без НДС: " . $mouse->price;
echo "<br>";


echo "Цена ноутбука с НДС: " . $laptopLenovo->getPriceWithTax() . "<br>";
echo "Цена мыши с НДС: " . $mouse->getPriceWithTax() . "<br>";

Product::setGlobalTaxRate(30);

echo "Цена ноутбука после повышения НДС: " . ($laptopLenovo->getPriceWithTax()) . "<br>";
echo "Цена мыши после повышения НДС: " . ($mouse->getPriceWithTax()) . "<br>";