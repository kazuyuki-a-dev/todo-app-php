<?php
session_start();
require_once __DIR__ . '/functions.php';

$id = $_GET['id'] ?? '';
$todos = loadTodos();
$targetTodo = null;

foreach ($todos as $todo) {
    if ($todo['id'] === $id) {
        $targetTodo = $todo;
        break;
    }
}

if ($targetTodo === null) {
    header('Location: index.php');
    exit;
}

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>TODO編集</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>TODOを編集</h1>
        <?php if ($error !== ''): ?>
            <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($targetTodo['id']); ?>">
            <input type="text" name="todo_text" value="<?php echo htmlspecialchars($targetTodo['text']); ?>" required>
            <button type="submit">更新</button>
        </form>

        <a href="index.php">キャンセルして一覧に戻る</a>
    </div>
</body>

</html>