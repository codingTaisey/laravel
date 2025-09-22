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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id(); // idカラム（主キー）
            $table->string('name', 30); // nameカラム（文字列型、30文字制限）
            $table->integer('type'); // typeカラム（整数型）
            $table->timestamps(); // created_at, updated_atカラム（timestamp型）
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
