<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'quantity' => 'required|integer|min:1',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);
        $menuItem = MenuItem::find($request->menu_item_id);

        if (!$menuItem) {
            return redirect()->route('menu.index')->with('error', 'Pizza nie została znaleziona');
        }
        
        $totalPrice = $menuItem->price * $request->quantity;
        $order = Order::create([
            'menu_item_id' => $request->menu_item_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'email' => $request->email,
            'delivery_address' => $request->address,
            'status' => 'new',
        ]);

        if ($order) {
            return redirect()->route('menu.index')->with('success', 'Zamówienie złożone pomyślnie');
        } else {
            return redirect()->route('menu.index')->with('error', 'Wystąpił błąd podczas złożenia zamówienia');
        }
    }
}   
