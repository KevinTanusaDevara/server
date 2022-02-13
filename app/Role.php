<?php

namespace App;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
