<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = [];

    public function unor()
    {
        return $this->belongsTo(Unor::class, 'unor_id', 'id');
    }
}
