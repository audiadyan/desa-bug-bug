<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stafs', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique()->nullable();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('position');
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('education')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('social_id')->nullable();
            $table->foreignId('editor_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stafs');
    }
};
