<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="category";
    public $timestamps=false;
    protected $primaryKey="category_id";

    protected $fillable = [
        'category_name',
        'description',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id','category_id');
    }
}
