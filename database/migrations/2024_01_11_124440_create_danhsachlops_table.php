<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('danhsachlops', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->string('hoten');
            $table->string('lop');
            $table->string('sdt')->unique();
            $table->string('email')->unique();
            $table->timestamps(); // Thêm cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhsachlops');
    }
};
