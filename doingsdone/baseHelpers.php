<?php
require_once ("baseConn.php");
$show_comp = $_GET["show_completed"];
function getCategory ($db_connect)
{
    $sql = "SELECT projects.id, projects.name, (SELECT count(id) from tasks where tasks.category=projects.id) from projects";
    $result = mysqli_query($db_connect, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $category = array();
    foreach ($rows as $row) {
        $category[] = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "count" => $row['(SELECT count(id) from tasks where tasks.category=projects.id)'],
        );
    }
    return $category;
}
function getTasks($db_connect, $filterTable, $category)
{
    $sql = "SELECT * FROM tasks";
    $result = mysqli_query($db_connect, $sql);
    $rows2 = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $tableTask = array();
    foreach ($rows2 as $row) {
        $tableTask[] = Array(
            "id" => $row["id"],
            "name" => $row['name'],
            "date" => $row['date'],
            "cat" => $row['category'],
            "isDone" => $row['isDone']
        );
    }
    if($filterTable>count($category) || $filterTable < 1 || $category[$filterTable-1]['count']==0)
    {
        return false;
    }
    else {
        return $tableTask;
    }
}