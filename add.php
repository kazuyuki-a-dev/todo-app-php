<?php
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['todo_text'])) {
    addTodo($_POST['todo_text']);
}

header('Location: index.php');
exit;
