<?php

namespace Mariojgt\MasterStore\Models;

use Mariojgt\MasterStore\Models\BaseMasterModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends BaseMasterModel
{
    use HasFactory;

    // Brand relationship
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Category relationship
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
