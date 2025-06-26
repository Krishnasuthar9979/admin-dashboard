<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table="order_detail";
    public $timestamps=false;
    protected $primarykey="od_id";

    protected $fillable = [
        'o_id',
        'p_id',
        'price',
        'qty',
    ];    
    public function order()
    {
        return $this->belongsTo(Order::class, 'o_id','o_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'p_id','p_id');
    }
    public function shipping()
    {
        return $this->hasMany(Shipping::class, 'ship_id','ship_id');
    }
}
