<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primarykey = "id_order";
    protected $fillable = [
        'email', 'product_id'
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
