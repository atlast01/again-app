@extends('frontend.layouts.app') {{-- เปลี่ยนเป็น layout หน้าบ้าน --}}

@section('title', 'ค้นหาร้านอาหารมินิมอลที่คุณชื่นชอบ')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4 font-weight-bold mb-3">ค้นหาร้านอาหารมินิมอล</h1>
    <p class="text-muted mb-5">รวบรวมร้านอาหารบรรยากาศดีที่คัดสรรมาเพื่อคุณโดยเฉพาะ</p>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <form action="{{ route('home') }}" method="GET" class="input-group mb-5 shadow-sm" style="border-radius: 50px; overflow: hidden;">
                <input type="text" name="search" class="form-control search-input border-0 bg-white" placeholder="ค้นหาชื่อร้านหรือประเภทอาหาร..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-search font-weight-bold" type="submit">ค้นหา</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    @forelse($restaurants as $restaurant)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: 0.3s;">
            <img src="{{ $restaurant->image_url ?? 'https://via.placeholder.com/500x300?text=No+Image' }}" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body p-4">
                <span class="badge badge-light mb-2 text-uppercase" style="letter-spacing: 1px; color: #e63946;">
                    {{ $restaurant->category->category_name ?? 'ทั่วไป' }}
                </span>
                <h4 class="font-weight-bold mb-2">{{ $restaurant->name }}</h4>
                <p class="text-muted small mb-3">{{ $restaurant->short_desc }}</p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <span class="font-weight-bold" style="color: #f1c40f;">★ {{ $restaurant->rating ?? '0.0' }}</span>
                    <a href="#" class="btn btn-sm btn-outline-dark px-3" style="border-radius: 20px;">ดูเพิ่มเติม</a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <p class="text-muted">ยังไม่พบข้อมูลร้านอาหารแนะนำในขณะนี้</p>
    </div>
    @endforelse
</div>
@endsection