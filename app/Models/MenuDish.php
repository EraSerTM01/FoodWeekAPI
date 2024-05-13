<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuDish extends Model
{
    use HasFactory;

    protected $table = 'menus_dishes';

    protected $fillable = [
        'menu_id',
        'dish_id',
        'meal',
        'day'
    ];

    protected $with = ['dish'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class);
    }
}
