<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table="shipping";
    public $timestamps=false;
    protected $primarykey="ship_id ";
    //protected $foreignKey="e_id,od_id";

    protected $fillable = [
        'ship_id',
        'e_id',
        'c_id',
        'od_id',
        'ship_address',
        'city',
        'area',
        'pincode',
    ]; 

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'e_id','e_id');
    }
    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class, 'od_id','od_id');
    }   
    public function customer()
    {
    return $this->belongsTo(Customer::class, 'c_id', 'c_id');
    }
}
