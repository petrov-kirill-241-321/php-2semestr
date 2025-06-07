<?php
function renderMenu($active, $sub = '') {
    $items = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];

    $html = "<div class='menu'>";
    foreach ($items as $key => $label) {
        $class = ($active === $key) ? 'menu-item active' : 'menu-item';
        $html .= "<a href='?menu=$key' class='$class'>$label</a>";
    }
    $html .= "</div>";

    if ($active === 'view') {
        $subItems = [
            'by_created' => 'По дате добавления',
            'by_name' => 'По фамилии',
            'by_birth' => 'По дате рождения'
        ];
        $html .= "<div class='submenu'>";
        foreach ($subItems as $key => $label) {
            $class = ($sub === $key) ? 'submenu-item active' : 'submenu-item';
            $html .= "<a href='?menu=view&sort=$key' class='$class'>$label</a>";
        }
        $html .= "</div>";
    }
    return $html;
}
?>
