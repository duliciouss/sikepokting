<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unor extends Model
{
    use Uuid, HasFactory;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $guarded = [];
}
