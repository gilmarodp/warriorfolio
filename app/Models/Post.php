<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Z3d0X\FilamentFabricator\Models\Page;

class Post extends Page
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
