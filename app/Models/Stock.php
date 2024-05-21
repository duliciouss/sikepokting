<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory, HasUuids;

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
