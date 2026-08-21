<?php

function loadTodos(): array
{
    $filePath = __DIR__ . '/data.json';

    if (!file_exists($filePath)) {
        return [];
    }
    $json = file_get_contents($filePath);
    $todos = json_decode($json, true);

    if (!is_array($todos)) {
        return [];
    }
    return $todos;
}

function saveTodos(array $todos): void
{
    $filePath = __DIR__ . '/data.json';
    $json = json_encode($todos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($filePath, $json);
}

function addTodo(string $text): void
{
    $todos = loadTodos();

    $todos[] = [
        'id' => uniqid(),
        'text' => $text,
    ];

    saveTodos($todos);
}

function deleteTodo(string $id): void
{
    $todos = loadTodos();
    $todos = array_filter($todos, function ($todo) use ($id) {
        return $todo['id'] !== $id;
    });

    $todos = array_values($todos);

    saveTodos($todos);
}

function updateTodo(string $id, string $newText): void
{
    $todos = loadTodos();

    foreach ($todos as $key => $todo) {
        if ($todo['id'] === $id) {
            $todos[$key]['text'] = $newText;
        }
    }
    saveTodos($todos);
}

function validateTodoText(string $text): string
{
    if (trim($text) === '') {
        return 'TODOを入力してください';
    }

    if (mb_strlen($text) > 100) {
        return 'TODOは100文字以内で入力してください';
    }

    return '';
}