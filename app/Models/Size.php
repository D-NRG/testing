<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'sizes';
    protected $fillable = ['name'];
    public function attrs(){
        return $this->hasMany(Attr::class);
    }

}
