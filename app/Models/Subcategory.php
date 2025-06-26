<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table="sub_category";
    public $timestamps=false;
    protected $primarykey="subcategory_id";
    protected $foreignKey="category_id";

    protected $fillable = [
        'subcategory_name',
        'category_id',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','category_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'subcategory_id','subcategory_id');
    }
}
