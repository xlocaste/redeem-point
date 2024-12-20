<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'image',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'point',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot('quantity')->withTimestamps();
    }
}
