<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Material extends Model
{
    use HasSlug;

    protected $fillable = ['judul', 'slug', 'deskripsi', 'file'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug');
    }
    
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
