<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory, HasUuid;
    protected $table = 'access_user';
    protected $fillable = ['manage_account', 'manage_product', 'manage_transaction', 'manage_report', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
