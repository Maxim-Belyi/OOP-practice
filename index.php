<?php
spl_autoload_register(function ($className) {
    $path = __DIR__ . '/src/' . $className . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body bgcolor="#ffe4c4">
<h1>Всё работает</h1>
<?php
$book1 = new Book("Михаил Булгаков", "Мастер и Маргарита");
$book2 = new Book("Джордж Оруэлл", "1984");
$book3 = new Book("Лев Толстой", "Воскресение");
$book4 = new Book("Федор Достоевский", "Бесы");
$book5 = new Book("Франц Кафка", "Замок");

echo "--- Выводим данные обо всех книгах ---" . "<br>". "<br>";
$allBooks = Book::$catalog;

foreach ($allBooks as $books) {
    echo  $books->getBookTitle() . "<br>" ;
    echo  $books->getBookAuthor() . "<br>" ;
    echo "<strong>Статус: </strong>" . $books->getBookStatus() . "<br>" . "<br>" . "<br>" ;
}


echo "--- Начальная статистика библиотеки ---" . "<br>" . "<br>";
Book::showLibraryStatus();
echo "<br>";

echo "--- Берём книги ---" . "<br>" . "<br>";
$book1->takeBook();
$book5->takeBook();
$book3->takeBook();
$book2->takeBook();

$book1->takeBook();

echo "<br>";


echo "--- Промежуточная статистика ---" . "<br>" . "<br>";
Book::showLibraryStatus();
echo "<br>";


echo "--- Возвращаем пару книг ---" . "<br>" . "<br>";
$book1->returnBook();
$book3->returnBook();
$book5->returnBook();
echo "<br>";


echo "--- Финальная статистика ---" . "<br>" . "<br>";
Book::showLibraryStatus();

//class Product {
//    public $name;
//    public $price;
//
//    private function __construct($name, $price) {
//        $this->name = $name;
//        $this->price = $price;
//    }
//    public static function createFromArray($data) {
//        if (!isset($data['name']) || !isset($data['price'])) {
//            throw new Exception("Неверные данные для создания продукта");
//        }
//        return new self($data['name'], $data['price']);
//    }
//    public static function createEmpty() {
//        return new self("Товар по умолчанию", 0);
//    }
//}
//
//$productData = ['name' => 'Ноутбук', 'price' => 1200];
//$product1 = Product::createFromArray($productData);
//
//// Создаем другой объект
//$product2 = Product::createEmpty();
//
//var_dump($product1);
//var_dump($product2);
//class Rectangle
//{
//    public int $w;
//    public int $h;
//
//    public function __construct(int $w, int $h)
//    {
//        $this->w = $w;
//        $this->h = $h;
//    }
//
//    public function getWidth()
//    {
//        return $this->w;
//    }
//
//    public function getHeight()
//    {
//        return $this->h;
//    }
//
//    public function getArea() {
//        return $this->w * $this->h;
//    }
//}
//
//$rect = new Rectangle(8, 12);
//echo `Ширина` . $rect->getWidth() . "<br>";
//echo `Высота` . $rect->getHeight();
?>
</body>
</html>

