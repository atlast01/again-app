@extends('admin.layout')

@section('title', 'จัดการหมวดหมู่')

@section('content')
<div class="row mb-3">
    <div class="col-12 text-center text-sm-left">
        <h3 class="font-weight-bold" style="color: var(--highlight-color);">🏷️ จัดการหมวดหมู่</h3>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-auto-hide shadow-sm border-0">
    ✅ {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-3 p-md-4">
                <h5 class="mb-3 font-weight-bold text-center">➕ เพิ่มหมวดหมู่ใหม่</h5>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="small font-weight-bold text-uppercase">ชื่อหมวดหมู่</label>
                        <input type="text" name="category_name" class="form-control bg-light border-0" required placeholder="ชื่อหมวดหมู่...">
                    </div>
                    
                    <div class="form-group">
                        <label class="small font-weight-bold text-uppercase">รายละเอียด</label>
                        <textarea name="description" class="form-control bg-light border-0" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary-custom btn-block mt-3 py-2">💾 บันทึก</button>
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
                                <th class="text-center border-0">ID</th>
                                <th class="border-0">ชื่อหมวดหมู่</th>
                                <th class="border-0 text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td class="text-center align-middle small">{{ $category->id }}</td>
                                <td class="align-middle">
                                    <div class="font-weight-bold">{{ $category->category_name }}</div>
                                    <div class="small text-muted text-truncate" style="max-width: 150px;">{{ $category->description }}</div>
                                </td>
                                <td class="text-center align-middle">
                                    <div class="btn-group shadow-sm">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-white text-info">✏️</a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('ลบหรือไม่?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-white text-danger">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center py-5 text-muted">ไม่มีข้อมูล</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection