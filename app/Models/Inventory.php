<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    function color(){
        return $this->belongsTo(Color::class);
    }
    function size(){
        return $this->belongsTo(Size::class,'size_id');
    }
    function product(){
        return $this->belongsTo(Product::class);
    }
}
