<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_product extends Model
{
    use HasFactory;
    protected $table="purchase_product";
    public $timestamps=false;
    protected $primarykey="supplier_pid ";

    // protected $fillable = [
    //     's_id',
    //     'p_id',
    //     'qty',
    //     'price',
    // ]; 

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 's_id','s_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'p_id','p_id');
    }
}
