<?php

require_once ('baseConn.php');
require_once('helpers.php');

require_once ('baseHelpers.php');
$idCat = $_GET["project"];
$category = getCategory($db_connect);
$tableTask = getTasks($db_connect, $idCat, $category);

$page_content = include_template('main.php', [
	'projectRows' => $rows,
	'tasksRows' => $rows2,
	'idCat' => $idCat,
	'show_complete_tasks' => $show_comp,
    'result' => $result,
    'category' => $category,
    'tableTask' => $tableTask,
]);
$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => 'Дела в порядке'
]);
print($layout_content);

