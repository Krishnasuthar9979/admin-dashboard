<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table="employee";
    public $timestamps=false;
    protected $primarykey="e_id";

    public function purchase_product()
    {
        return $this->belongsTo(Purchase_product::class, 'supplier_pid','supplier_pid');
    }
    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'ship_id','ship_id');
    }
}
