<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';

    protected $fillable = [
        'title',
        'description',
        'technology',
        'url',
        'image_desktop',  // obraz do podglądu desktop
        'image_tablet',   // obraz do podglądu tablet
        'image_mobile',   // obraz do podglądu mobile
    ];

    /**
     * Zwraca pełny URL obrazu
     *
     * @param string $type 'desktop', 'tablet', 'mobile'
     * @return string|null
     */
    public function getImageUrl(string $type = 'desktop'): ?string
    {
        $column = match($type) {
            'tablet' => 'image_tablet',
            'mobile' => 'image_mobile',
            default => 'image_desktop',
        };

        return $this->$column ? asset('storage/' . $this->$column) : null;
    }
}