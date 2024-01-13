<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('ketquas', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->string('mssv'); // Khóa ngoại liên kết với sinh vien
            $table->foreign('mssv')->references('mssv')->on('sinhviens')->onDelete('cascade'); // Tự động xóa kết quả khi sinh viên bị xóa
            $table->integer('diem')->nullable(); // Điểm số (có thể null)
            $table->string('bang')->nullable(); // Chứng chỉ (có thể null)
            $table->string('email'); // Email liên quan đến kết quả (để gửi OTP)
            $table->string('phone'); // Điện thoại liên quan đến kết quả (để gửi OTP)
            $table->string('otp')->nullable(); // Mã OTP (có thể null, sẽ được cập nhật sau)
            $table->timestamp('otp_expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ketquas');
    }
};
