<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory, Uuid;

    public $incrementing = false;
    protected $keyType = 'uuid';
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
