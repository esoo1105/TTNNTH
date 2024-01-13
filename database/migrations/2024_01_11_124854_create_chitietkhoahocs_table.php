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
        Schema::create('chitietkhoahocs', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->string('ma_khoahoc');
            $table->foreign('ma_khoahoc')->references('ma_khoahoc')->on('khoahocs')->onDelete('cascade');
            $table->dateTime('thoigian_hoc');
            $table->integer('sotiet');
            $table->string('diadiemhoc');
            $table->string('thu_hoc');
            $table->foreignId('id_giangvien')->constrained('users')->onDelete('cascade'); // Sửa chỗ này để sử dụng constrained
            $table->string('loai_lop');
            $table->decimal('hocphi', 10, 3);
            $table->text('mota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietkhoahocs');
    }
};
