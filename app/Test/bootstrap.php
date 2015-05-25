<?php
/**
 * Created by PhpStorm.
 * User: takahashi
 * Date: 2015/05/25
 * Time: 17:21
 */
App::uses('Fabricate', 'Fabricate.Lib');

Fabricate::config(function($config) {
    $config->auto_validate = true;
});
/*
Fabricate::define('Post', function($data, $world) {
    return ['title' => $world->sequence('title', function($i) {
        return "タイトル{$i}";
    })];
});

$faker = Faker\Factory::create('ja_JP');
Fabricate::define('Person', function($data, $world) use ($faker) {
    return [
        'name' => $faker->name,
        'postcode' => $faker->postcode,
        'adress' => $faker->adress,
    ];
});
*/