<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function getImageAttribute() {
        return storage_path("products/$this->id/images/$this->id-image.png");
    }
}
