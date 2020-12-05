<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'stock', 'img_path'];

    public function Order()
    {
        return $this->belongsTo('\App\Models\Order');
    }
}
