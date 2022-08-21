<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $fillable = ['activity_name', 'activity_count', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
