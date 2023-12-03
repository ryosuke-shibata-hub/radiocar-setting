<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rc_setting', function (Blueprint $table) {
            $table->id();
            $table->string('setting_id')->unique();
            $table->string('account_uuid')->unique();
            $table->string('driving_scene');
            $table->string('genre');
            $table->string('chassis');
            $table->string('body');
            $table->string('transmitter');
            $table->string('amp');
            $table->string('servo');
            $table->string('gyro');
            $table->string('motor');
            $table->string('camber_f');
            $table->string('camber_r');
            $table->string('toe_f');
            $table->string('toe_r');
            $table->string('height_f');
            $table->string('height_r');
            $table->string('caster_f');
            $table->string('caster_r');
            $table->string('spur_gear');
            $table->string('shock');
            $table->string('oil_f');
            $table->string('oil_r');
            $table->string('spring_f');
            $table->string('spring_r');
            $table->string('piston_f');
            $table->string('piston_r');
            $table->string('other_1');
            $table->string('other_2');
            $table->string('other_3');
            $table->text('memo');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('image_4');
            $table->integer('publish_setting');
            $table->integer('delete_flg');
            $table->timestamp('create_date');
            $table->timestamp('update_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rc_setting');
    }
};
