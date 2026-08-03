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
        return $todo['$id'] !== $id;
    });

    $todos = array_values($todos);

    saveTodos($todos);
}
