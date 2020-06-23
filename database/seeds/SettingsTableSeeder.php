<?php


use Illuminate\Database\Seeder;
use doctype_admin\Settings\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Setting::class)->create();
    }
}
