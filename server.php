<?php
// prende il contenuto JSON
$string = file_get_contents("todo.json");
// decodifica la stringa e la salva in:
$todo_list = json_decode($string, true);


if (isset($_POST["newTodo"])) {
    $new_todo = [
        'text' => $_POST["newTodo"],
        'done' => false
    ];
    $todo_list[] = $new_todo;
    // nel file json gli spedisci il todo ecode-ato
    file_put_contents("todo.json", json_encode($todo_list));
};

if (isset($_POST["done"])) {
    $index_position = $_POST["index"];
    $done_changed = $_POST["done"];
    if ($done_changed === 'true') {
        $done_changed = true;
    } else {
        $done_changed = false;
    };
    $todo_list[$index_position] //l' indice che ci portiamo dietro dal JS, a qst posizione...
    ["done"] = $done_changed; //pusha il done cambiato...
    //e scrivi nel JSON...
    file_put_contents("todo.json", json_encode($todo_list));
};


// alla chiamata axios restituisci todo list codificato json
header('Content-Type: application/json');
echo json_encode($todo_list);
