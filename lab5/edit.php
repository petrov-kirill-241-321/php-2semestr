<?php
function renderEditForm() {
    global $pdo;
    $id = $_GET['id'] ?? null;
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $stmt = $pdo->prepare("UPDATE contacts SET last_name=?, first_name=?, patronymic=?, gender=?, birth_date=?, phone=?, address=?, email=?, comment=? WHERE id=?");
        $stmt->execute([
            $_POST['last_name'], $_POST['first_name'], $_POST['patronymic'],
            $_POST['gender'], $_POST['birth_date'], $_POST['phone'],
            $_POST['address'], $_POST['email'], $_POST['comment'], $_POST['id']
        ]);
        $message = "<p style='color:green;'>Запись обновлена</p>";
    }

    $stmt = $pdo->query("SELECT id, first_name, last_name FROM contacts ORDER BY last_name, first_name");
    $links = "";
    while ($row = $stmt->fetch()) {
        $selected = ($row['id'] == $id) ? 'style="font-weight:bold;"' : '';
        $links .= "<a href='?menu=edit&id={$row['id']}' $selected>{$row['last_name']} {$row['first_name']}</a><br>";
    }

    if ($id) {
        $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id=?");
        $stmt->execute([$id]);
        $contact = $stmt->fetch();
    } else {
        $contact = ["id"=>'',"last_name"=>'',"first_name"=>'',"patronymic"=>'',"gender"=>'',"birth_date"=>'',"phone"=>'',"address"=>'',"email"=>'',"comment"=>''];
    }

    return $message . $links . "
    <form method='POST'>
        <input type='hidden' name='id' value='{$contact['id']}'>
        <input name='last_name' value='{$contact['last_name']}' placeholder='Фамилия' required><br>
        <input name='first_name' value='{$contact['first_name']}' placeholder='Имя' required><br>
        <input name='patronymic' value='{$contact['patronymic']}' placeholder='Отчество'><br>
        <select name='gender'>
            <option value='м'" . ($contact['gender'] === 'м' ? ' selected' : '') . ">Мужской</option>
            <option value='ж'" . ($contact['gender'] === 'ж' ? ' selected' : '') . ">Женский</option>
        </select><br>
        <input type='date' name='birth_date' value='{$contact['birth_date']}'><br>
        <input name='phone' value='{$contact['phone']}' placeholder='Телефон'><br>
        <input name='address' value='{$contact['address']}' placeholder='Адрес'><br>
        <input name='email' value='{$contact['email']}' placeholder='Email'><br>
        <textarea name='comment' placeholder='Комментарий'>{$contact['comment']}</textarea><br>
        <button name='update'>Обновить</button>
    </form>";
}
