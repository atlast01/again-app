@extends('layout')

@section('title', 'ค้นหาร้านอาหารมินิมอล')

@section('content')
    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <h1 class="mb-4">ค้นหาร้านอาหารมินิมอลที่คุณชื่นชอบ</h1>
            <form action="{{ route('home') }}" method="GET">
                <div class="input-group input-group-lg">
                    <input type="text" name="search" class="form-control" placeholder="พิมพ์ชื่อร้านอาหาร..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary-custom" type="submit">ค้นหา</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($restaurants as $restaurant)
            <div class="col-md-4 mb-4">
                <div class="card card-custom h-100">
                    <img src="{{ $restaurant->image_url ?? 'https://via.placeholder.com/500x300?text=No+Image' }}" class="card-img-top" alt="{{ $restaurant->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <span class="badge badge-warning mb-2" style="background-color: var(--primary-color); color:white;">{{ $restaurant->category->category_name ?? 'ไม่มีหมวดหมู่' }}</span>
                        <h5 class="card-title">{{ $restaurant->name }}</h5>
                        <p class="card-text text-muted">{{ $restaurant->short_desc }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                        <strong>⭐ {{ $restaurant->rating }}/5.0</strong>
                        <a href="{{ route('restaurant.detail', $restaurant->id) }}" class="btn btn-sm btn-primary-custom">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                <h4>ยังไม่มีร้านอาหารในระบบ</h4>
                <p>หน้าเว็บเชื่อมต่อฐานข้อมูลสำเร็จแล้ว! รอเพิ่มข้อมูลร้านอาหาร</p>
            </div>
        @endforelse
    </div>
@endsection