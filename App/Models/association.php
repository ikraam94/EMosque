<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class association extends Model
{
    use HasFactory;
    protected $table="association";
    protected $fillable=['association','jawatan','content'];
}
