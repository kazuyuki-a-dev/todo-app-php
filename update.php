<?php

require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $text = $_POST['todo_text'] ?? '';
    $error = validateTodoText($text);

    if ($id === '') {
        header('Location: index.php');
        exit;
    }

    if ($error === '') {
        updateTodo($id, $text);
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['error'] = $error;
        header('Location: edit.php?id=' . urlencode($id));
        exit;
    }
}

header('Location: index.php');
exit;
