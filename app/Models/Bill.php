<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table="bill";
    public $timestamps=false;
    protected $primarykey="bill_id ";
   // protected $foreignKey="o_id,od_id,c_id";

    protected $fillable = [
        'bill_id',
        'o_id ',
        'c_id ',
        'order_date',
        'delivery_date',
        'total_amount',
        'od_id ',
        'tax ',
        'discount ',
    ]; 

    public function order()
    {
        return $this->belongsTo(Order::class, 'o_id','o_id');
    }
    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class, 'od_id','od_id');
    }   
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'c_id','c_id');
    }
}
