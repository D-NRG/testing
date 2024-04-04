<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    public $table = 'products';
    protected $fillable = ['name','id'];
    public function attrs()
    {
        return $this->hasMany(Attr::class);
    }


}
