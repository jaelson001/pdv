<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProducts;

class Order extends Model
{
    use HasFactory;

    public function products(): HasMany{
        return $this->hasMany(OrderProducts::class);
    }
}
