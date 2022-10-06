<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $guarded = [];

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function parent()
    {
        return $this->belongsTo(Commodity::class, 'parent_id', 'id');
    }
}
