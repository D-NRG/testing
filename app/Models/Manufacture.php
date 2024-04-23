<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'manufactures';
    protected $fillable =['name'];
    public function attrs(){
        return $this->hasMany(Attr::class);
    }

}
