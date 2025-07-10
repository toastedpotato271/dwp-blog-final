<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_category');
    }
}
