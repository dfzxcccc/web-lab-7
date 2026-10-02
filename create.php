<?php
$errors = [];
$title = "";
$description = "";
$priority = "Low";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $priority = $_POST['priority'];

    if (empty($title)) {
        $errors[] = "Поле Назва не може бути порожнім";
    }
    
    if (empty($description)) {
        $errors[] = "Поле Опис не може бути порожнім";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lab 7</title>
</head>
<body>

    <a href="index.php">Назад</a>

    <h2>Створення завдання</h2>

    <?php if (!empty($errors)): ?>
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px; width: 300px;">
            <?php foreach ($errors as $err): ?>
                <p style="margin: 0;"><?= $err ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="create.php" method="POST">
        <label>Назва:</label><br>
        <input type="text" name="title" value="<?= $title ?>"><br><br>
        
        <label>Опис:</label><br>
        <textarea name="description"><?= $description ?></textarea><br><br>
        
        <label>Пріоритет:</label><br>
        <select name="priority">
            <option value="Low" <?= $priority == 'Low' ? 'selected' : '' ?>>Low</option>
            <option value="Medium" <?= $priority == 'Medium' ? 'selected' : '' ?>>Medium</option>
            <option value="High" <?= $priority == 'High' ? 'selected' : '' ?>>High</option>
        </select><br><br>
        
        <button type="submit">Зберегти</button>
    </form>

</body>
</html>