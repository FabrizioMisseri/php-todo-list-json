<?php
// prende il contenuto JSON
$string = file_get_contents("todo.json");
// decodifica la stringa e la salva in:
$todo_list = json_decode($string, true);



// alla chiamata axios restituisci todo list codificato json
header('Content-Type: application/json');
echo json_encode($todo_list);
