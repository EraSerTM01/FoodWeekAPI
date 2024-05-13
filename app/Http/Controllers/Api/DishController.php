<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{

    public function index()
    {
        $dishes = Dish::get();
        return response()->json([
            'data' => $dishes
        ]);
    }
}
