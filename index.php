<?php
require_once __DIR__ . '/functions.php';
$todos = loadTodos();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>TODOリスト</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>TODOリスト</h1>

        <!-- 入力フォーム -->
        <form action="add.php" method="post">
            <input type="text" name="todo_text" placeholder="新しいTODOを入力" required>
            <button type="submit">追加</button>
        </form>

        <!-- 一覧表示 -->
        <ul class="todo-list">
            <?php if (empty($todos)): ?>
                <li class="empty">まだTODOがありません</li>
            <?php else: ?>
                <?php foreach ($todos as $todo): ?>
                    <li>
                        <span class="todo-text"><?php echo htmlspecialchars($todo['text']); ?></span>
                        <div class="todo-actions">
                            <a href="edit.php?id=<?php echo htmlspecialchars($todo['id']); ?>">編集</a>
                            <form action="delete.php" method="post" class="delete-form">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($todo['id']); ?>">
                                <button type="submit">削除</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</body>

</html>