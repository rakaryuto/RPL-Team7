<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Coffee() {
        return $this->belongsToMany(Coffee::class, 'products', 'coffee_id', 'id');
    }
    
    public function Pack() {
        return $this->belongsToMany(Pack::class, 'products', 'pack_id', 'id');
    }
    
    public function Size() {
        return $this->belongsToMany(Size::class, 'products', 'size_id', 'id');
    }
}
