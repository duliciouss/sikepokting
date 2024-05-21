<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $guarded = [];

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function commodity()
    {
        return $this->belongsTo(Commodity::class);
    }
}
