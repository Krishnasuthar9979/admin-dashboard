<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    use HasFactory;
    protected $table="frame";
    public $timestamps=false;
    protected $primarykey="frame_id";

    protected $fillable = [
        'frame_type',
        'frame_material',
        'frame_shape',
        'temple_colour',
        'model_no',
    ];
    
    // A frame can be related to many categories (if needed, you can define the inverse relationship)
    public function category()
    {
        return $this->hasMany(Category::class, 'frame_id','frame_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class,'frame_id','frame_id');
    }
    public function prescription()
    {
        return $this->belongsTo(Prescription::class,'frame_id','frame_id');
    }
}
