<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="order";
    public $timestamps=false;
    protected $primarykey="o_id";
    protected $foriegnkey="c_id,prescription_id";


    protected $fillable = [
        'o_date',
        'o_amt',
        'c_id ',
        'prescription_id ',
        'o_status',
        'created_at',
    ];    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'c_id','c_id');
    }
    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'od_id','od_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'o_id','o_id');
    }
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id','prescription_id');
    }
    public function complain()
    {
        return $this->hasMany(Complain::class, 'o_id','o_id');
    }
    public function saleproduct()
    {
        return $this->hasMany(SaleProduct::class, 'o_id','o_id');
    }
    public function ship()
    {
        return $this->hasOne(Ship::class, 'c_id', 'c_id');
    }
}
