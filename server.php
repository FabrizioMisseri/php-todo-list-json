<?php

$array_todo = ['ciao', 'luca', 'sono'];


header('Content-Type: application/json');
echo json_encode($array_todo);
