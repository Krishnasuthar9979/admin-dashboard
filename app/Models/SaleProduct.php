<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;
    protected $table="saleproduct";
    public $timestamps=false;
    protected $primarykey="sale_product_id";
    protected $foriegnkey="c_id";
    protected $foriegnKey="p_id"; 

     public function product()
     {
         return $this->belongsTo(Product::class, 'p_id', 'p_id');
     }
     
     public function customer()
     {
         return $this->belongsTo(Customer::class, 'c_id', 'c_id');
     }
     
}
