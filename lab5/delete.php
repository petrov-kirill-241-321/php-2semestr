<?php
function renderDeleteList() {
    global $pdo;
    $message = '';
    if (isset($_GET['del_id'])) {
        $stmt = $pdo->prepare("SELECT last_name FROM contacts WHERE id=?");
        $stmt->execute([$_GET['del_id']]);
        $lastName = $stmt->fetchColumn();

        $stmt = $pdo->prepare("DELETE FROM contacts WHERE id=?");
        $stmt->execute([$_GET['del_id']]);

        $message = "<p style='color:green;'>Запись с фамилией $lastName удалена</p>";
    }

    $stmt = $pdo->query("SELECT id, last_name, first_name FROM contacts ORDER BY last_name, first_name");
    $html = $message;
    while ($row = $stmt->fetch()) {
        $html .= "<a href='?menu=delete&del_id={$row['id']}'>{$row['last_name']} {$row['first_name']}</a><br>";
    }
    return $html;
}
