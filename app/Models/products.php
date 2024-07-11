<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'discount', 'category', 'img1', 'img2', 'img3', 'img4', 'img5'];
}
