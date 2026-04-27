<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // บอก Laravel ว่า 2 คอลัมน์นี้อนุญาตให้ผู้ใช้กรอกข้อมูลเข้ามาได้ (Mass Assignment)
    protected $fillable = ['category_name', 'description'];
}
