<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
     public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
