<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsite extends Model
{
    use HasFactory;

    protected $timestamps = false;

    protected $attributes = [
        'secured' => false,
        'password' => null,
    ];




}
