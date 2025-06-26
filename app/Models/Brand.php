<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table="brand";
    public $timestamps=false;
    protected $primarykey="brand_id";

    protected $fillable = [
        'brand_name',
    ];
     // A brand can be related to many categories (inverse relationship)
      public function category()
      {
         return $this->hasMany(Category::class, 'brand_id', 'brand_id');
      }
      public function product()
      {
          return $this->hasMany(Product::class,'brand_id','brand_id');
      }
}
