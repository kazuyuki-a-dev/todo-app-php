<?php
require_once __DIR__ . '/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
    deleteTodo($_POST['id']);
}

header('Location: index.php');
exit;