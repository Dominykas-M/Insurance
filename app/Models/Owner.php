<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'phone',
        'email',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
