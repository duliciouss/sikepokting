<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commodity extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

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
