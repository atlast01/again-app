@extends('admin.layouts.admin')

@section('title', 'จัดการร้านอาหาร')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
        <h3 class="font-weight-bold mb-2 mb-sm-0" style="color: var(--highlight-color);">🍽️ จัดการร้านอาหาร</h3>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-auto-hide shadow-sm border-0 py-3" style="border-left: 5px solid #28a745;">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h5 class="mb-3 font-weight-bold">➕ เพิ่มร้านอาหารใหม่</h5>
                <form action="#" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label class="small font-weight-bold text-uppercase">ชื่อร้าน <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control bg-light border-0" required placeholder="ชื่อร้านอาหาร">
                    </div>

                    <div class="form-group">
                        <label class="small font-weight-bold text-uppercase">หมวดหมู่ <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control bg-light border-0" required>
                            <option value="">-- เลือกหมวดหมู่ --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="small font-weight-bold text-uppercase">คำอธิบายสั้นๆ (Short Desc)</label>
                        <textarea name="short_desc" class="form-control bg-light border-0" rows="3" placeholder="จุดเด่นของร้าน..."></textarea>
                    </div>

                    <button type="button" class="btn btn-primary-custom btn-block mt-3 py-2 font-weight-bold">💾 บันทึก (ยังใช้งานไม่ได้)</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 text-center">รูป</th>
                                <th class="border-0">ชื่อร้าน</th>
                                <th class="border-0">หมวดหมู่</th>
                                <th class="border-0 text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($restaurants as $restaurant)
                            <tr>
                                <td class="text-center align-middle">
                                    <img src="{{ $restaurant->image_url ?? 'https://via.placeholder.com/50' }}" class="rounded shadow-sm" width="50" height="50" style="object-fit: cover;">
                                </td>
                                <td class="align-middle">
                                    <strong>{{ $restaurant->name }}</strong><br>
                                    <small class="text-muted">{{ $restaurant->short_desc }}</small>
                                </td>
                                <td class="align-middle text-info font-weight-bold">
                                    {{ $restaurant->category->category_name ?? '-' }}
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-sm btn-light">⚙️ แก้ไข</button>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center py-5 text-muted">ยังไม่มีข้อมูลร้านอาหาร</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection