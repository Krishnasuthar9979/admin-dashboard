<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Ship extends Model
{
    use HasFactory;

    protected $table = 'ship_add'; // ✅ Make sure your table name is 'ship'

    // ✅ If your table does not have `updated_at`, you can disable timestamps or just leave them
    public $timestamps = true; // Set to false if you only have `created_at`

    // ✅ Fillable fields for mass assignment
    protected $fillable = [
        'id',
        'c_id',
        'full_name',
        'phone',
        'email',
        'address',
        'city',
        'state',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'c_id', 'c_id');
    }
}
