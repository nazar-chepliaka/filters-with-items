<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\getTableColumnsNames;

class Category extends Model
{
    use HasFactory, getTableColumnsNames;

    protected $guarded = [];
}
