<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'phoneable_id', 'phoneable_type'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function phoneable()
    {
        return $this->morphTo();
    }
}
