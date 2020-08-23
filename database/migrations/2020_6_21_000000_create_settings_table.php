<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        /* Creating table for settings */
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('setting_name');
            $table->string('string_value')->nullable();
            $table->integer('integer_value')->nullable();
            $table->text('text_value')->nullable();
            $table->boolean('boolean_value')->nullable();
            $table->integer('setting_type');
            $table->string('setting_custom')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('settings');
    }
}
