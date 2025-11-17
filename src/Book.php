<?php

class Book
{
    public string $title;
    public string $author;
    public bool $onShelf;

    public static array $catalog = [];
    public static int $booksTakenCount = 0;


    public function __construct($author, $title)
    {
        $this->author = $author;
        $this->title = $title;
        $this->onShelf = true;
        self::$catalog[] = $this;
    }

    //метод имитирует взятие книги с полки
    public function takeBook()
    {
        if ($this->onShelf) {
            $this->onShelf = false;
            echo "Вы взяли с полки книгу '{$this->title}'" . "<br>";
            self::$booksTakenCount++;
        } else {
            echo "Книга '{$this->title}' уже взята" . "<br>";
        }
    }

    //метод имитирует возврат книги на полку
    public function returnBook()
    {
        if (!$this->onShelf) {
            $this->onShelf = true;
            echo "Вы вернули на полку книгу '{$this->title}'" . "<br>";
            self::$booksTakenCount-- . "<br>";
        } else {
            echo "Книга {$this->title} уже на полке" . "<br>";
        }
    }

    public function getBookTitle()
    {
        return "Название книги: {$this->title}" . "<br>";
    }

    public function getBookAuthor()
    {
        return "Автор книги: {$this->author}" . "<br>";
    }

    public function getBookStatus() {
        return $this->onShelf ? "На полке" : "На руках" . "<br>";
    }

    //метод возвращает инфу о книге
    public function getBookInfo()
    {
        $statusText = $this->getBookStatus();
        return "Вы взяли книгу: {$this->title} Автор: {$this->author},  Статус: {$statusText}";
    }

    public static function showLibraryStatus()
    {
        echo "Количество книг в каталоге: " . count(self::$catalog) . "<br>";
        echo "Количество книг на руках:" . self::$booksTakenCount . "<br>";
    }
}

