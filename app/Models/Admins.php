<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;
    protected $fillable = [
        'FIst_Name','Last_Name','Phone','Email','Sex','Username','Password','Status'
    ];
}
