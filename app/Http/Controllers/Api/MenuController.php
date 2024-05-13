<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\MenuDish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::where('user_id', Auth::id())->with('menusDishes')->get();
        return response()->json([
            'data' => $menus
        ]);
    }

    public function store(StoreMenuRequest $request)
    {
        $validated = $request->validated();

        $menu = Menu::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'start_at' => $validated['start_at'],
            'end_at' => Carbon::parse($validated['start_at'])->addDays(7)->toDateString()
        ]);

        $plan = $validated['plan'];

        $dishesEntities = [];

        foreach ($plan as $weekDay => $dishes) {
            foreach ($dishes as $meal => $dishId) {
                $dishesEntities[] = new MenuDish([
                    'menu_id' => $menu->id,
                    'dish_id' => $dishId,
                    'meal' => $meal,
                    'day' => $weekDay
                ]);
            }
        }

        $menu->menusDishes()->saveMany($dishesEntities);

        return $menu->load('menusDishes');
    }


    public function show(Menu $menu)
    {
        abort_if(
            $menu->user_id !== Auth::id(),
            403,
            "Access denied!"
        );

        return response()->json([
            'data' => $menu->load('menusDishes')
        ]);
    }


    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        abort_if(
            $menu->user_id !== Auth::id(),
            403,
            "Access denied!"
        );

        $validated = $request->validated();
    
        $menu->update([
            'start_at' => $validated['start_at'],
            'end_at' => Carbon::parse($validated['start_at'])->addDays(7)->toDateString()
        ]);
    
        return response()->json([
            'message' => 'Menu updated successfully',
            'data' => $menu->load('menusDishes')
        ]);
    }


    public function destroy(Menu $menu)
    {
        $menu->delete();

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
