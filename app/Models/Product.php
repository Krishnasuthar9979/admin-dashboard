<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table="product";
    public $timestamps=false;
    protected $primarykey="p_id";

    protected $fillable = [
        'p_name',
        'price',
        'size',
        'color',
        'qty',
        'p_image',
        'category_id',
        'brand_id',
        'subcategory_id',
        'frame_id',
        'prescription_id',
        'description',
    ]; 

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'subcategory_id');
    }
    public function frame()
    {
        return $this->belongsTo(Frame::class, 'frame_id','frame_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id','brand_id');
    }
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id','prescription_id');
    }
    public function order_detail()
    {
        return $this->belongsTo(Orderdetail::class, 'od_id','od_id');
    }
    public function purchase_product()
    {
        return $this->belongsTo(Purchase_product::class, 'supplier_pid','supplier_pid');
    }
    public function saleproduct()
    {
        return $this->belongsTo(Saleproduct::class, 'sale_product_id','sale_product_id');
    }
}
