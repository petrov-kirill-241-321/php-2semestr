<?php
// index.php

session_start();

// Подключение модулей
require_once 'menu.php';
require_once 'viewer.php';
require_once 'add.php';
require_once 'edit.php';
require_once 'delete.php';

// Получение параметров
$menu = $_GET['menu'] ?? 'view';
$sort = $_GET['sort'] ?? 'by_created';
$page = $_GET['page'] ?? 1;

// Выбор контента
switch ($menu) {
    case 'add':
        $content = renderAddForm();
        break;
    case 'edit':
        $content = renderEditForm();
        break;
    case 'delete':
        $content = renderDeleteList();
        break;
    case 'view':
    default:
        $content = renderViewer($sort, $page);
        break;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?= renderMenu($menu, $sort) ?>
    <div class="content">
        <?= $content ?>
    </div>
</body>
</html>
