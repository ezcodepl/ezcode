<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    /**
     * Atrybuty, które można masowo przypisywać.
     * Muszą być zgodne z kolumnami w migracji posts.
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'excerpt',
        'category',
        'read_time',
        'status',
        'date_public',
    ];

    /**
     * Atrybuty, które powinny zostać skonwertowane na daty.
     */
    protected $casts = [
        'date_public' => 'datetime',
    ];

    /**
     * Relacja: Post należy do użytkownika (autora).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacja: Post może mieć wiele zdjęć (galeria).
     */
    public function images(): HasMany
    {
        return $this->hasMany(PostImage::class);
    }

    /**
     * Relacja: Pobranie tylko miniatury posta.
     */
    public function thumbnail(): HasOne
    {
        return $this->hasOne(PostImage::class)->where('is_thumbnail', true);
    }
    public function getUrlAttribute(): string
{
    return asset('storage/' . $this->path);
}
}