@extends('admin.layout')

@section('title', 'จัดการหมวดหมู่')

@section('content')
<div class="row mb-3">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <h3 class="font-weight-bold" style="color: var(--highlight-color);">🏷️ จัดการหมวดหมู่ (Categories)</h3>
    </div>
</div>

@if(session('success'))
<div class="row">
    <div class="col-12">
        <div class="alert alert-success alert-auto-hide shadow-sm border-0" style="border-left: 5px solid #28a745;">
            ✅ {{ session('success') }}
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-lg-4 col-md-12 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-2">
                <h5 class="mb-0 font-weight-bold" style="color: var(--highlight-color);">➕ เพิ่มหมวดหมู่ใหม่</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-bold">ชื่อหมวดหมู่ <span class="text-danger">*</span></label>
                        <input type="text" name="category_name" class="form-control bg-light border-0" required placeholder="เช่น อาหารญี่ปุ่น, คาเฟ่">
                    </div>
                    
                    <div class="form-group">
                        <label class="font-weight-bold">รายละเอียดเพิ่มเติม</label>
                        <textarea name="description" class="form-control bg-light border-0" rows="4" placeholder="คำอธิบายสั้นๆ..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary-custom btn-block mt-4 py-2 font-weight-bold">💾 บันทึกข้อมูล</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-weight-bold" style="color: var(--highlight-color);">📋 รายการหมวดหมู่ทั้งหมด</h5>
                <span class="badge badge-pill badge-light text-muted">{{ $categories->count() }} รายการ</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead style="background-color: #f4f6f9; color: var(--highlight-color);">
                            <tr>
                                <th width="10%" class="text-center border-top-0">ID</th>
                                <th width="25%" class="border-top-0">ชื่อหมวดหมู่</th>
                                <th width="45%" class="border-top-0">รายละเอียด</th>
                                <th width="20%" class="text-center border-top-0">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td class="text-center align-middle text-muted">{{ $category->id }}</td>
                                <td class="align-middle"><strong style="color: var(--primary-color);">{{ $category->category_name }}</strong></td>
                                <td class="align-middle text-muted small">{{ $category->description ?? '-' }}</td>
                                <td class="text-center align-middle">
                                    <div class="btn-group shadow-sm" role="group">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-light text-info" title="แก้ไข">
                                            ✏️
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบหมวดหมู่ [{{ $category->category_name }}]?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger" title="ลบ">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <h5 class="mb-0">📭 ยังไม่มีข้อมูลหมวดหมู่ในระบบ</h5>
                                    <small>โปรดเพิ่มข้อมูลที่ฟอร์มด้านซ้ายมือ</small>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection