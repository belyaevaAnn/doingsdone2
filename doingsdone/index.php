<?php

require_once ('baseConn.php');
require_once('helpers.php');

require_once ('baseHelpers.php');
$idCat = $_GET["project"];
$category = getCategory($db_connect);
$tableTask = getTasks($db_connect, $idCat, $category);

if ($_GET["addTask"]==1)
{
    $page_content = include_template('addTempl.php',[
        'category' => $category,
    ]);
}
else{
    $page_content = include_template('main.php', [
        'tasksRows' => $rows2,
        'idCat' => $idCat,
        'show_complete_tasks' => $show_comp,
        'result' => $result,
        'category' => $category,
        'tableTask' => $tableTask,
    ]);
}

$layout_content = include_template('layout.php', [
    'projectRows' => $rows,
    'content' => $page_content,
    'title' => 'Дела в порядке',
    'category' => $category,
    'idCat' => $idCat,
]);
print($layout_content);

