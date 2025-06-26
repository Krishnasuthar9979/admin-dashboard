<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table="customer";
    public $timestamps=false;
    protected $primarykey="c_id";

    protected $fillable = [
        'c_name',
        'c_email',
        'c_password',
        'c_gender',
        'c_mobileno',
        'c_address',
    ];    
    protected $hidden = [
        'c_password',
    ];


     public function order()
     {
         return $this->hasMany(Order::class, 'c_id','c_id');
     }
     public function prescriptions()
     {
        return $this-> hasOne(Prescription::class, 'c_id','c_id');
     }
     public function saleproduct()
     {
         return $this->belongsTo(Saleproduct::class, 'c_id','c_id');
     }
     public function complain()
     {
         return $this->hasMany(Complain::class, 'c_id','c_id');
     }
    public function orderdetail()
    {
        return $this->hasMany(Orderdetail::class, 'od_id','od_id');
    }
}