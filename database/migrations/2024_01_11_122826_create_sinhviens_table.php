<?php

// migrations/2024_01_11_create_sinhvien_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('sinhviens', function (Blueprint $table) {
            $table->string('mssv')->primary(); // Mã số sinh viên là khóa chính
            $table->string('hoten');
            $table->date('ngaysinh');
            $table->dateTime('thoigian_dangky');
            $table->decimal('sotien_dadong', 10, 3); // Số tiền đã đóng (tùy thuộc vào yêu cầu cụ thể)
            $table->string('lop');
            $table->string('noisinh');
            $table->string('sdt')->unique();
            $table->string('email')->unique();
            $table->timestamps(); // Thêm cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('sinhviens');
    }
};
