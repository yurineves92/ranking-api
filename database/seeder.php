<?php

use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Inserir usuários
Capsule::table('user')->insert([
    ['id' => 1, 'name' => 'Joao'],
    ['id' => 2, 'name' => 'Jose'],
    ['id' => 3, 'name' => 'Paulo']
]);

// Inserir movimentos
Capsule::table('movement')->insert([
    ['id' => 1, 'name' => 'Deadlift'],
    ['id' => 2, 'name' => 'Back Squat'],
    ['id' => 3, 'name' => 'Bench Press']
]);

// Inserir personal records
Capsule::table('personal_record')->insert([
    ['id' => 1, 'user_id' => 1, 'movement_id' => 1, 'value' => 100.0, 'date' => '2021-01-01 00:00:00'],
    ['id' => 2, 'user_id' => 1, 'movement_id' => 1, 'value' => 180.0, 'date' => '2021-01-02 00:00:00'],
    ['id' => 3, 'user_id' => 1, 'movement_id' => 1, 'value' => 150.0, 'date' => '2021-01-03 00:00:00'],
    ['id' => 4, 'user_id' => 1, 'movement_id' => 1, 'value' => 110.0, 'date' => '2021-01-04 00:00:00'],
    ['id' => 5, 'user_id' => 2, 'movement_id' => 1, 'value' => 110.0, 'date' => '2021-01-04 00:00:00'],
    ['id' => 6, 'user_id' => 2, 'movement_id' => 1, 'value' => 140.0, 'date' => '2021-01-05 00:00:00'],
    ['id' => 7, 'user_id' => 2, 'movement_id' => 1, 'value' => 190.0, 'date' => '2021-01-06 00:00:00'],
    ['id' => 8, 'user_id' => 3, 'movement_id' => 1, 'value' => 170.0, 'date' => '2021-01-01 00:00:00'],
    ['id' => 9, 'user_id' => 3, 'movement_id' => 1, 'value' => 120.0, 'date' => '2021-01-02 00:00:00'],
    ['id' => 10, 'user_id' => 3, 'movement_id' => 1, 'value' => 130.0, 'date' => '2021-01-03 00:00:00'],
    ['id' => 11, 'user_id' => 1, 'movement_id' => 2, 'value' => 130.0, 'date' => '2021-01-03 00:00:00'],
    ['id' => 12, 'user_id' => 2, 'movement_id' => 2, 'value' => 130.0, 'date' => '2021-01-03 00:00:00'],
    ['id' => 13, 'user_id' => 3, 'movement_id' => 2, 'value' => 125.0, 'date' => '2021-01-03 00:00:00'],
    ['id' => 14, 'user_id' => 1, 'movement_id' => 2, 'value' => 110.0, 'date' => '2021-01-05 00:00:00'],
    ['id' => 15, 'user_id' => 1, 'movement_id' => 2, 'value' => 100.0, 'date' => '2021-01-01 00:00:00'],
    ['id' => 16, 'user_id' => 2, 'movement_id' => 2, 'value' => 120.0, 'date' => '2021-01-01 00:00:00'],
    ['id' => 17, 'user_id' => 3, 'movement_id' => 2, 'value' => 120.0, 'date' => '2021-01-01 00:00:00']
]);

echo "Seeder concluído com sucesso!\n";
