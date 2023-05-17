<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsite extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $attributes = [
        'secured' => false,
        'password' => null,
    ];

    protected $fillable = [
        'name', 'url_name', 'visible', 'order', 'editable', 'header_image', 'title', 'description'
    ];

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('visible', true);
    }




}
