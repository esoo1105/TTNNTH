<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('khoahocs', function (Blueprint $table) {
            $table->string('ma_khoahoc')->primary(); // Trường mã khóa học làm khóa chính
            $table->string('ten_khoahoc');
            $table->string('diadiem_dangky');
            $table->date('ngay_khaigiang');
            $table->string('hinhanh')->nullable();
            $table->string('nguoi_dangbai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khoahocs');
    }
};
