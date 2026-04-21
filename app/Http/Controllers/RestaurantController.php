<?php

namespace App\Http\Controllers;

use App\Models\Restaurant; // อย่าลืมเรียกใช้ Model เพื่อดึงข้อมูล
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * หน้าแรก: แสดงรายการร้านอาหารทั้งหมด (Catalog)
     */
    public function index()
    {
        // ดึงข้อมูลร้านอาหารทั้งหมดจากฐานข้อมูล
        $restaurants = Restaurant::all();
        
        // ส่งข้อมูลไปที่ไฟล์ resources/views/index.blade.php
        return view('index', compact('restaurants'));
    }

    /**
     * หน้ารายละเอียด: แสดงข้อมูลร้านอาหารทีละร้าน
     */
    public function show($id)
    {
        // ค้นหาร้านอาหารตาม ID ถ้าไม่เจอให้ขึ้นหน้า 404
        $restaurant = Restaurant::findOrFail($id);
        
        // ส่งข้อมูลไปที่ไฟล์ resources/views/detail.blade.php
        return view('detail', compact('restaurant'));
    }
}