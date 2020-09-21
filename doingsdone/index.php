<?php

require_once ('baseConn.php');
require_once('helpers.php');
$page_content = include_template('main.php', [
	'projectRows' => $rows,
	'tasksRows' => $rows2,
	'idCat' => $idCat,
	'show_complete_tasks' => $show_comp,
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Дела в порядке'
]);
print($layout_content);

