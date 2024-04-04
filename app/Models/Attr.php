<?php

namespace App\Models;

use App\Http\Controllers\ManufactureController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    use HasFactory;

    protected $table = 'attrs';
    static function attr_add($color,$size,$categories,$manufacture,$product)
    {
        $attr = new Attr;
        $attr->color_id= $color;
        $attr->size_id = $size;
        $attr->categories_id = $categories;
        $attr->manufacture_id = $manufacture;
        $attr->product_id = $product;
        return $attr;
    }
    public function color()
    {
        return $this->belongsTo(Color::class,'color_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class,'size_id');
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class,'manufacture_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class,'categories_id');
    }
}
