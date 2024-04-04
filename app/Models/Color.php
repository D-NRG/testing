<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class Color extends Model
{

    use HasFactory;
    protected $fillable =['name'];
    protected $table = 'colors';

}
