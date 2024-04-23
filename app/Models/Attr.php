<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $table = 'attrs';
    protected $primaryKey = 'id';
    protected $fillable =['product_id','size_id','color_id','manufacture_id','categories_id'];

    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }
    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }
    public function manufacture(){
        return $this->belongsTo(Manufacture::class,'manufacture_id');
    }
    public function categories(){
        return $this->belongsTo(Categories::class,'categories_id');
    }
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

}
