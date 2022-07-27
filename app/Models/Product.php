<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
