<?php
require_once ("helpers.php");
require_once ("connect.php");

$errorsIds = [];
$errorsIds = array_column($category, 'id');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $required = ['name', 'date'];
    $errors = [];

    $rules = [
        'name' => function($value) use ($errorsIds) {
            return validateName($value, 3, 200);
        },
        'date' => function($value) {
            return validateDate($value);
        }
    ];
    $gif = filter_input_array(INPUT_POST, ['name' => FILTER_DEFAULT, 'date' => FILTER_DEFAULT], true);

    foreach ($gif as $key => $value) {
        if (isset($rules[$key])) {
            $rule = $rules[$key];
            $errors[$key] = $rule($value);
        }
        if (in_array($key, $required) && empty($value)) {
            $errors[$key] = "Поле $key надо заполнить";
        }
    }
    $errors = array_filter($errors);

    if (!empty($_FILES['file']['name']))
    {
        $filename= $_FILES['file']['tmp_name'];
        $path = __DIR__.'/uploads/'.$_FILES['file']['name'];
        move_uploaded_file($filename, $path);
    }


    if (!count($errors)) {
        $nowCat = $_POST['project'];
        addTaskDB($db_connect);
        header("Location: index.php?project=$nowCat");
    }
}
