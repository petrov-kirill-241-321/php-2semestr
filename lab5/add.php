<?php
function renderAddForm() {
    global $pdo;
    $message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
        try {
            $stmt = $pdo->prepare("INSERT INTO contacts (last_name, first_name, patronymic, gender, birth_date, phone, address, email, comment)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $_POST['last_name'], $_POST['first_name'], $_POST['patronymic'],
                $_POST['gender'], $_POST['birth_date'], $_POST['phone'],
                $_POST['address'], $_POST['email'], $_POST['comment']
            ]);
            $message = "<p style='color:green;'>Запись добавлена</p>";
        } catch (Exception $e) {
            $message = "<p style='color:red;'>Ошибка: запись не добавлена</p>";
        }
    }
    return $message . "
    <form method='POST'>
        <input name='last_name' placeholder='Фамилия' required><br>
        <input name='first_name' placeholder='Имя' required><br>
        <input name='patronymic' placeholder='Отчество'><br>
        <select name='gender'>
            <option value='м'>Мужской</option>
            <option value='ж'>Женский</option>
        </select><br>
        <input type='date' name='birth_date'><br>
        <input name='phone' placeholder='Телефон'><br>
        <input name='address' placeholder='Адрес'><br>
        <input name='email' placeholder='Email'><br>
        <textarea name='comment' placeholder='Комментарий'></textarea><br>
        <button name='add'>Добавить</button>
    </form>";
}
