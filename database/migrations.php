<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

$capsule = new Capsule;

// Criar a tabela `user`
Capsule::schema()->create('user', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name', 255);
});

// Criar a tabela `movement`
Capsule::schema()->create('movement', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name', 255);
});

// Criar a tabela `personal_record`
Capsule::schema()->create('personal_record', function (Blueprint $table) {
    $table->increments('id');
    $table->unsignedInteger('user_id');
    $table->unsignedInteger('movement_id');
    $table->float('value');
    $table->dateTime('date');

    // Chaves estrangeiras
    $table->foreign('user_id')->references('id')->on('user');
    $table->foreign('movement_id')->references('id')->on('movement');
});

echo "Migração concluída sem ON DELETE CASCADE!\n";
