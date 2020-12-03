<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function materialInfo()
    {
        return $this->hasMany(MaterialInfo::class);
    }
}
