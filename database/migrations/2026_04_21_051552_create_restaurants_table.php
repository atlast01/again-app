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
        Schema::create('restaurants', function (Blueprint $table) {
        $table->id();
        // เชื่อมกับตาราง categories (Foreign Key)
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        
        $table->string('name'); // ชื่อร้าน
        $table->string('short_desc'); // คำอธิบายสั้นๆ
        $table->text('full_desc'); // รายละเอียดเต็ม
        $table->string('image_url')->nullable(); // ลิงก์รูปภาพ
        $table->string('address'); // ที่อยู่
        $table->decimal('rating', 2, 1)->default(0.0); // คะแนน (เช่น 4.5)
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
