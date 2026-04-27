@extends('admin.layout')

@section('title', 'แก้ไขหมวดหมู่')

@section('content')
<div class="row mb-3 justify-content-center">
    <div class="col-lg-8 col-md-10 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center">
        <h3 class="font-weight-bold mb-2 mb-sm-0" style="color: var(--highlight-color);">✏️ แก้ไขหมวดหมู่</h3>
        <a href="{{ route('admin.categories') }}" class="btn btn-sm btn-outline-secondary">🔙 กลับไปหน้ารายการ</a>
    </div>
</div>

@if(session('success'))
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="alert alert-success alert-auto-hide shadow-sm border-0">
            ✅ {{ session('success') }}
        </div>
    </div>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-body p-3 p-md-5">
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold">ชื่อหมวดหมู่ <span class="text-danger">*</span></label>
                        <input type="text" name="category_name" class="form-control form-control-lg bg-light border-0" value="{{ $category->category_name }}" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="font-weight-bold">รายละเอียดเพิ่มเติม</label>
                        <textarea name="description" class="form-control bg-light border-0" rows="6">{{ $category->description }}</textarea>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="d-flex flex-column flex-sm-row justify-content-end">
                        <a href="{{ route('admin.categories') }}" class="btn btn-light px-4 mb-2 mb-sm-0 mr-sm-2">ยกเลิก</a>
                        <button type="submit" class="btn btn-primary-custom px-5 font-weight-bold">💾 บันทึกการแก้ไข</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection