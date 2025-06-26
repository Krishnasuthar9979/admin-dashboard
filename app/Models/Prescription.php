<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table="prescription";
    public $timestamps=false;
    protected $primarykey="prescription_id";

    protected $fillable = [
        'c_id',
        'left_sphere',
        'left_cylinder',
        'left_axis',
        'right_sphere',
        'right_cylinder',
        'right_axis',
    ];
    public function product()
    {
        return $this->hasMany(Product::class,'prescription_id','prescription_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class,'prescription_id','prescription_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'c_id','c_id');
    }
}
