<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $table = 'complain'; // Specify the table name if it's different from the model name
    protected $primaryKey = 'com_id'; // Specify the primary key if it's different from 'id'
    protected $fillable = [
        'com_id ',
        'com_date',
        'o_id',
        'contact_person',
        'contact_email',
        'c_query',
        'img_front',
        'img_back',
        'accept_reject'
    ];
    public $timestamps = true; // Enable timestamps if your table has created_at and updated_at columns

    // Define any relationships if needed
    // For example, if you have a relationship with the Order model:
    public function order()
    {
        return $this->belongsTo(Order::class, 'o_id', 'o_id');
    }
}
