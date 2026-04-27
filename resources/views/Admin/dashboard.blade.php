@extends('admin.layout')

@section('title', 'ภาพรวมระบบ')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📊 Dashboard (ภาพรวมระบบ)</h2>
</div>

<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <div class="card card-custom p-4 bg-white h-100">
            <h5 class="text-muted">ร้านอาหารทั้งหมดในระบบ</h5>
            <h1 class="display-4 font-weight-bold" style="color: var(--primary-color);">
                {{ $count_restaurants }} <small style="font-size: 1rem; color: #666;">ร้าน</small>
            </h1>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card card-custom p-4 bg-white h-100" style="border-left-color: var(--highlight-color);">
            <h5 class="text-muted">หมวดหมู่ทั้งหมดในระบบ</h5>
            <h1 class="display-4 font-weight-bold" style="color: var(--highlight-color);">
                {{ $count_categories }} <small style="font-size: 1rem; color: #666;">หมวดหมู่</small>
            </h1>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm p-4">
    <h5 class="mb-3 text-success">✅ เชื่อมต่อระบบหลังบ้านสำเร็จ!</h5>
    <p>ยินดีต้อนรับสู่ระบบหลังบ้านครับ ตอนนี้แอปพลิเคชันของคุณดึงข้อมูลมาจากตาราง <code>restaurants</code> และ <code>categories</code> ได้อย่างสมบูรณ์แบบแล้ว</p>
    <p class="mb-0 text-muted">ขั้นตอนต่อไปที่คุณสามารถทำได้คือการสร้างหน้าระบบ <b>เพิ่ม/ลด/แก้ไข (CRUD)</b> ข้อมูลในเมนูด้านบนครับ</p>
</div>
@endsection