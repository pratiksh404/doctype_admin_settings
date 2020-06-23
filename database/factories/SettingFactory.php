<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;
use doctype_admin\Settings\Models\Setting;


$factory->define(Setting::class, function (Faker $faker) {
    return [
        'setting_name' => 'site_name',
        'string_value' => 'doctype nepal',
        'integer_value' => null,
        'text_value' => null,
        'setting_type' => '1',
        'setting_custom' => null
    ];
});
