<?php

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id']) && !empty($_POST['todo_text'])) {
    updateTodo($_POST['id'], $_POST['todo_text']);
}

header('Location: index.php');
exit;
