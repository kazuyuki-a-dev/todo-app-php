<?php
session_start();
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['todo_text'] ?? '';
    $error = validateTodoText($text);

    if ($error === '') {
        addTodo($text);
    } else {
        $_SESSION['error'] = $error;
    }
}

header('Location: index.php');
exit;
