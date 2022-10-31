<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiso_asign_rol extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_permiso',
        'id_rol',
    ];   
}
