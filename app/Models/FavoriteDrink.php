<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteDrink extends Model
{
    use HasFactory;

    protected $fillable = [
        'drink_id',
    ];

    public static function isFavorite(string $drinkId): bool
    {
        $drink = FavoriteDrink::where('drink_id', '=', $drinkId)->get();
        if ($drink->isEmpty()) {
            return false;
        }
        return true;
    }
}
