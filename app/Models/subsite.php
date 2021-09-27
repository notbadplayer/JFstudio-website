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

    public function scopeVisible(Builder $query): Builder
    {
        return $query->where('visible', true);
    }




}
