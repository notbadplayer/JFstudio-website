<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $attributes = [
        'published' => true,
        'publishDate' => null,
    ];

    protected $fillable = [
        'title', 'content', 'published', 'publishDate', 'subsite_id'
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function subsite()
    {
        return $this->belongsTo(subsite::class);
    }
}
