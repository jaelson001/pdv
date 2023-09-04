<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Scopes\ScopeCompany;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderProduct;

class Order extends Model
{
    use HasFactory;

    public function products(): HasMany{
        return $this->hasMany(OrderProduct::class, );
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new ScopeCompany);
    }

    public static function brazilianTime(string $date): string{
        $data = new \DateTime($date);
        $dataFormatada = $data->format('d/m/Y H:i:s');
        return $dataFormatada;
    }
}
