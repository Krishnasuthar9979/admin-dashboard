<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review_feedback extends Model
{
    use HasFactory;
    protected $table="review_feedback";
    public $timestamps=false;
    protected $primarykey="review_id ";

    protected $fillable = [
        'c_id',
        'p_id',
        'review_comment',
        'rating',
        'review_date',
    ]; 

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'c_id','c_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'p_id','p_id');
    }
}
