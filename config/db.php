<?php

// return [
//     'class' => 'yii\db\Connection',
//     'dsn' => 'mysql:host=localhost;dbname=propusk',
//     'username' => 'propusk',
//     'password' => 'propusk',
//     'charset' => 'utf8',
// ];
$_fn=realpath(__DIR__."/../data")."/propusk.sqlite";

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:'.$_fn,
];
