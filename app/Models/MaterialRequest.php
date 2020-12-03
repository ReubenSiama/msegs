<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialRequest extends Model
{
    use HasFactory;

    public function districtManager()
    {
        return $this->belongsTo(DistrictManager::class);
    }

    public function materialInfo()
    {
        return $this->belongsTo(MaterialInfo::class, 'material_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function materialAllocatedInfo()
    {
        return $this->belongsTo(MaterialInfo::class, 'allocated_material_id');
    }
}
