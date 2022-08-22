<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasUuid, HasFactory;
    protected $table = 'market';

    protected $fillable = [
        'market_name',
        'phone_number',
        'address',
    ];
}
