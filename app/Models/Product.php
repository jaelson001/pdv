<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ScopeCompany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        static::addGlobalScope(new ScopeCompany);
    }
}
