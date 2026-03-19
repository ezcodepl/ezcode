<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'date_public',
        'status',
        'user_id'
    ];

    protected $casts = [
        'date_public' => 'datetime',
    ];

    // 🔗 relacja do użytkownika
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
