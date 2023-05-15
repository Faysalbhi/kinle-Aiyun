<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.variation.index',[
            'colors'=>Color::all(),
            'sizes'=>Size::all(),
        ]);
        
    }
    function add_color(Request $request){

        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
        ]);

        return back();
    }

    function add_size(Request $request){
        Size::insert([
            'size_name'=>$request->size_name,
        ]);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variation $variation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variation $variation)
    {
        //
    }
}
