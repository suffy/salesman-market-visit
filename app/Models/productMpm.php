<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productMpm extends Model
{
    use HasFactory;
    protected $table = "product_mpm";
    protected $fillable = ["id_ref","kodeprod"];
}
