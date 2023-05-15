<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $sizes = Size::all();
        $colors = Color::all();
        $inventories = Inventory::where('product_id', $product->id)->get();
        return view('backend.inventory.index',
        [
            'product_info'=>$product,
            'colors'=>$colors,
            'sizes'=>$sizes,
            'inventories'=>$inventories,
        ]);
    }

  
      function store(Request $request){
        $match=['product_id'=>$request->product_id,'color_id'=>$request->color_id,'size_id'=>$request->size_id];
        if(Inventory::where($match)->exists()){
            Inventory::where($match)->increment('quantity', $request->quantity);
            return back();
        }
        else{
            Inventory::insert([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
            ]);
            return back();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
