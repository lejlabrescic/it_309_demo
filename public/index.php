<?php
require __DIR__ . '/../vendor/autoload.php';
require 'db.php';

use App\TaskRepository;

Flight::route('GET /tasks', function() {
    $repo = new TaskRepository(Flight::get('db'));
    Flight::json($repo->all());
});

Flight::route('GET /tasks/@id', function($id) {
    $repo = new TaskRepository(Flight::get('db'));
    $task = $repo->get($id);
    if ($task) {
        Flight::json($task);
    } else {
        Flight::halt(404, 'Task not found');
    }
});

Flight::route('POST /tasks', function() {
    $data = Flight::request()->data->getData();
    $repo = new TaskRepository(Flight::get('db'));
    Flight::json($repo->create($data));
});

Flight::route('PUT /tasks/@id', function($id) {
    $data = Flight::request()->data->getData();
    $repo = new TaskRepository(Flight::get('db'));
    Flight::json($repo->update($id, $data));
});

Flight::route('DELETE /tasks/@id', function($id) {
    $repo = new TaskRepository(Flight::get('db'));
    if ($repo->delete($id)) {
        Flight::json(['message' => 'Task deleted']);
    } else {
        Flight::halt(404, 'Task not found');
    }
});

Flight::start();
