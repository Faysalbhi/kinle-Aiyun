<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Thumbnail;
use Illuminate\Http\Request;
use Str;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.index',[
            'products'=>Product::withCount('inventories')->orderBy('id','DESC')->paginate('10'),
            'categories'=>Category::all(),
        ]);
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
         $name =  str_replace(' ', '-', $request->product_name);
         $slug = Str::lower($name).'-'.random_int(10000,99999);
        //  $sku = Str::lower(substr($name,0,3)).'-'.random_int(10000,99999);

        // insert product without images 
        $product_id = Product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'slug'=>$slug,
            // 'sku'=>$sku,
            'product_price'=>$request->product_price,
            'discount'=>$request->discount,
            'after_discount'=>$request->product_price - ($request->product_price*$request->discount/100),
            'brand'=>$request->brand,
            'short_desc'=>$request->short_desp,
            'long_desc'=>$request->long_desp,
            'additional_info'=>$request->additional_info,
        ]);

        // check previw image set or not 
        if(isset($request->preview)){
            $preview = $request->preview;
            $extension = $preview->getClientOriginalextension();
            $file_name = Str::lower($name).'-'.$product_id.'.'.$extension;
            Image::make($preview)->resize(680,680)->save(public_path('/uploads/product/preview/'.$file_name));

            Product::find($product_id)->update([
                'preview'=>$file_name,
            ]);
        }

        // check Thumbnail/Gallery image set or not 
        if(isset($request->thumbnails)){
            $thumbnails = $request->thumbnails;
            foreach ($thumbnails as $key=>$thumbnail){
            $thumbnail_extension = $thumbnail->getClientOriginalextension();
            $thumb_file_name = Str::lower($name).'-'.$product_id.$key.'.'.$thumbnail_extension;
                Image::make($thumbnail)->resize(680,680)->save(public_path('/uploads/product/thumbnail/'.$thumb_file_name));

                Thumbnail::insert([
                    'product_id'=>$product_id,
                    'thumbnail'=>$thumb_file_name,
                ]);
            }
        }
        return redirect()->route('products')->withSuccess('Product Added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    function getSubcategory(Request $request){
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();

        $str='<option value="">-- select subcategory --</option>';
        foreach ($subcategories as $subcategory){
            $str .= "<option value='$subcategory->id'>$subcategory->subcategory_name</option>";
        }
        echo $str;
    }
}
