<?php

namespace Mariojgt\MasterStore\Models;

use Illuminate\Database\Eloquent\Model;
use Mariojgt\Magnifier\Models\ModelMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseMasterModel extends Model
{
    use HasFactory;

    // Polymorphic relation with the media
    public function media()
    {
        return $this->morphMany(ModelMedia::class, 'model');
    }
}
