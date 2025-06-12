<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);





$notes = $db->query('select * from notes where user_id = 1')->all();



view("notes/index.view.php", [
    'title' => 'Notes Page',
    'heading' => 'My Notes',
    'notes' => $notes
]);