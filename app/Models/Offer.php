<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table="offers";
    protected $primarykey='offer_id';
    public $timestamps=false;
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'discount_percentage',
    //     'start_date',
    //     'end_date',
    //     'status',
    //     'created_at',
    //     'updated_at',
    // ];
}
