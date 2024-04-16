<?php

namespace App\Models;

use App\Http\Controllers\MaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attr extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $table = 'attrs';
    protected $primaryKey = 'id';
    protected $fillable =['product_id','size_id','color_id','manufacture_id','categories_id'];


}
