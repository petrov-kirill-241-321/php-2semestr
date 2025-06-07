<?php
require_once 'db.php';
function renderViewer($sort = 'by_created', $page = 1) {
    global $pdo;
    switch ($sort) {
        case 'by_name':
            $orderBy = 'last_name, first_name';
            break;
        case 'by_birth':
            $orderBy = 'birth_date';
            break;
        default:
            $orderBy = 'created_at';
    }

    $limit = 10;
    $offset = ($page - 1) * $limit;

    $countStmt = $pdo->query("SELECT COUNT(*) FROM contacts");
    $total = $countStmt->fetchColumn();
    $totalPages = ceil($total / $limit);

    $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY $orderBy LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->execute();
    $contacts = $stmt->fetchAll();

    $html = "<table border='1' cellpadding='5' cellspacing='0'>";
    $html .= "<tr>
        <th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Пол</th>
        <th>Дата рождения</th><th>Телефон</th><th>Адрес</th>
        <th>Email</th><th>Комментарий</th>
    </tr>";

    foreach ($contacts as $contact) {
        $html .= "<tr>
            <td>{$contact['last_name']}</td>
            <td>{$contact['first_name']}</td>
            <td>{$contact['patronymic']}</td>
            <td>{$contact['gender']}</td>
            <td>{$contact['birth_date']}</td>
            <td>{$contact['phone']}</td>
            <td>{$contact['address']}</td>
            <td>{$contact['email']}</td>
            <td>{$contact['comment']}</td>
        </tr>";
    }

    $html .= "</table><div style='margin-top:10px;'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        $border = ($i == $page) ? '2px solid black' : 'none';
        $html .= "<a href='?menu=view&sort=$sort&page=$i' style='margin-right:5px; padding:3px; border:$border;'>$i</a>";
    }
    $html .= "</div>";
    return $html;
}
?>
