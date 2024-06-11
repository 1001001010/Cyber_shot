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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->timestamps();
        });
        DB::table('categories')->insert([
            ['name' => 'Видеокарты', 'link' => 'Video_cards'],
            ['name' => 'Оперативная память', 'link' => 'RAM'],
            ['name' => 'Материнские платы', 'link' => 'Motherboards'],
            ['name' => 'HDD', 'link' => 'HDD'],
            ['name' => 'Процессоры', 'link' => 'Processors'],
            ['name' => 'Блоки питания', 'link' => 'Power_supplies'],
            ['name' => 'SSD', 'link' => 'SSD'],
            ['name' => 'Корпусы', 'link' => 'Cases'],
            ['name' => 'Прочее', 'link' => 'Other'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
