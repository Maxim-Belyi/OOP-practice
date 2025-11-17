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


</body>
</html>

