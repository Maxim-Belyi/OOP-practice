<?php
require_once 'autoload.php';

use Library\Core\Library;
use Library\Core\Member;
use Library\Items\Book;
use Library\Items\Magazine;

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
<h1>Библиотека работает!</h1>
<?php

$library = new Library();

$book1 = new Book("Война и мир", "Лев Толстой");
$book2 = new Book("1984", "Джордж Оруэлл");
$book3 = new Book("Замок", "Франц Кафка");
$book4 = new Book("Тошнота", "Жан Поль Сартр");

$magazine1 = new Magazine("National Geographic", 154);
$magazine2 = new Magazine("Наука и Техника", 110);

$member1 = new Member("Иван Иванов");
$member2 = new Member("Мария Пупкина");

$library->addLibraryItem($book1);
$library->addLibraryItem($book2);
$library->addLibraryItem($book3);
$library->addLibraryItem($book4);
$library->addLibraryItem($magazine1);
$library->addLibraryItem($magazine2);

$library->registerMember($member1);
$library->registerMember($member2);

echo "--- Библиотека готова ---" . "<br>" . "<br>";
echo "Пользователи: " . "{$member1->getName()} {$member2->getName()}" . "<br>";
echo "Книги: " . "<br>" . "{$book1->getSummary()}{$book2->getSummary()}{$book3->getSummary()}{$magazine1->getSummary()}{$magazine2->getSummary()}" . "<br>";
echo "<hr>";

//пользователь 1 берёт книгу
echo "{$member1->getName()}" . " берёт книгу {$book3->getSummary()}" . "<br>";
$library->lendItem($member1, $book3);
echo "<hr>";

//пользователь 2 пытается взять ту же книгу
echo "{$member2->getName()}" . " пытается взять книгу {$book3->getSummary()} которая уже у пользователя {$member1->getName()}" . "<br>";
$library->lendItem($member1, $book3);
echo "<hr>";

//пользователь 1 берёт неодалживаемое издание
echo "{$member1->getName()}" . "пытается взять журнал <strong>{$magazine1->getTitle()}</strong>" . "<br>";
$library->lendItem($member1, $magazine1);
echo "<hr>";

//пользователь 1 возвращает книгу
echo "{$member1->getName()}" . "возвращает {$book3->getSummary()}" . "<br>";
$library->acceptReturn($book3);
echo "<hr>";

//пользователь 2 снова пытается взять книгу
echo "{$member2->getName()}" . "берёт книгу {$book3->getSummary()}" . "<br>";
$library->lendItem($member2, $book3);
echo "<hr>";

//пользователь 2 ещё раз берёт книгу
echo "{$member2->getName()}" . "берёт книгу {$book1->getSummary()}" . "<br>";
$library->lendItem($member2, $book1);
echo "<hr>";

//пользователь 2 берёт неодалживаемое издание
echo "{$member2->getName()}" . "берёт книгу {$magazine2->getSummary()}" . "<br>";
$library->lendItem($member2, $magazine2);
echo "<hr>";

echo "<h2>Итог: </h2>" . "<br>";
echo "Книги на руках у {$member1->getName()}" . "<br>";
$member1Books = $member1->getBorrowedItems();
if (empty($member1Books)) {
    echo "У пользователя {$member1->getName()} нет изданий на руках" . "<br>";
} else {
    foreach ($member1Books as $book) {
        echo "- " . $book->getSummary() . "<br>";
    }
}
echo "<hr>";

echo "Книги на руках у {$member2->getName()}" . "<br>";
$member2Books = $member2->getBorrowedItems();
if (empty($member2Books)) {
    echo "У пользователя {$member2->getName()} нет изданий на руках";
} else {
    foreach ($member2Books as $book) {
        echo "- " . $book->getSummary() . "<br>";
    }
}
echo "<hr>";

//смотрим что осталось в библиотеке
echo "<h2>Издания доступные для выдачи в данный момент: </h2>";
$availableItems = $library->getAvailableItems();
if (empty($availableItems)) {
    echo "В данный момент нет доступных изданий =(";
} else {
    foreach ($availableItems as $item) {
        echo "- " . $item->getSummary() . "<br>";
    }
}
echo "<hr>";
//недоступные для выдачи издания
echo "<h2>Издания недоступные для выдачи: </h2>";
$unavailableItems = $library->getUnavailableItems();
if (empty($unavailableItems)) {
    echo "В данный момент таких изданий нет =)";
} else {
    foreach ($unavailableItems as $item) {
        echo "- " . $item->getSummary() . "<br>";
    }
}
?>
</body>
</html>

