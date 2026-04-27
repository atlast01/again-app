<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant; // ดึงตารางร้านอาหารมาใช้
use App\Models\Category;   // ดึงตารางหมวดหมู่มาใช้

class AdminController extends Controller
{
    /** Main Dashboard page */
    public function dashboard()
    {
        // นับจำนวนร้านอาหารและหมวดหมู่ทั้งหมดเพื่อไปโชว์ในกราฟ/การ์ด
        $count_restaurants = Restaurant::count();
        $count_categories = Category::count();
        
        // ส่งข้อมูลไปที่หน้า resources/views/admin/dashboard.blade.php
        return view('admin.dashboard', compact('count_restaurants', 'count_categories'));
    }

    /** Category management page */
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /** หน้าจัดการร้านอาหาร */
    public function restaurants()
    {
        // with('category') คือการดึงข้อมูลหมวดหมู่มาพร้อมกับร้านอาหารเลย
        $restaurants = Restaurant::with('category')->get();
        $categories = Category::all();

        return view('admin.restaurants', compact('restaurants', 'categories'));
    }

    /** Create Function */
    public function storeCategory(Request $request) {

        // 1. Check if the user has entered a category name.
        $request->validate([
            'category_name' => 'required|max:100'
        ]);

        // 2. Record the data in the categories table.
        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description
        ]);

        // 3. Return to the previous page with a message indicating success.
        return redirect()->back()->with('success', 'เพิ่มหมวดหมู่สำเร็จ!');
    }

    /** Edit function */
    public function editCategory($id) {
        $category = Category::findOrFail($id); // Search for old information by ID
        return view('admin.edit_category', compact('category'));
    }

    /** update function */
    public function updateCategory(Request $request, $id) {
        $request->validate([
            'category_name' => 'required|max:100'
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'description' => $request->description
        ]);
        return redirect()->back()->with('success', 'แก้ไขหมวดหมู่สำเร็จ!');
    }

    /** delete function */
    public function deleteCategory($id) {
        
        // Search categories by ID and then delete them.
        Category::destroy($id);

        return redirect()->back()->with('success', 'ลบหมวดหมู่สำเร็จ!');
    }

}