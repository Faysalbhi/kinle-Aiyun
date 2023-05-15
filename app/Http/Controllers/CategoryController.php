<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category.index',[
            'categories'=>Category::latest()->paginate(2),
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
  
        function store(CategoryRequest $request){

        $category_id = Category::insertGetId([
            'name'=>$request->name,
        ]);

        if(isset($request->img)){
            $category_image = $request->img;
        $extension = $category_image->getClientOriginalExtension();
        $file_name = $category_id.'.'.$extension;

        Image::make($category_image)->save(public_path('uploads/category/'.$file_name));

        Category::find($category_id)->update([
            'img'=>$file_name,
        ]);
        
        }

        return redirect()->route('categories')->with('success', 'Category Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     function edit(Category $category){
        return view('backend.category.edit', [
            'category'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    function update(Request $request,Category $category){
        if($request->img == ''){
            $category->update([
                'name'=>$request->name,
            ]);
            return back()->with('updated', 'Category Updated Successfully');
        }
        else{
            $delete_from = public_path('/uploads/category/'.$category->img);
            unlink($delete_from);

            $img = $request->img;
            $extension = $img->getClientOriginalExtension();
            $file_name = $category->id.'.'.$extension;
            Image::make($img)->save(public_path('uploads/category/'.$file_name));
            $category->update([
                'img'=>$file_name,
            ]);

            return back()->with('updated', 'Category Updated Successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Category $category){
        $category->delete();
        return back()->with('delete', 'Category Deleted Successfully');
    }
    function trashedList(){
        return view('backend.category.trashed',[
            'trashed'=>Category::onlyTrashed()->get(),
        ]);

    }

     function forcedelete($category_id){
        $img = Category::onlyTrashed()->find($category_id)->img;
        $delete_from = public_path('/uploads/category/'.$img);
        unlink($delete_from);
        Category::onlyTrashed()->find($category_id)->forceDelete();
        return back()->with('hard_delete', 'Category Deleted Successfully');
    }

    function restore($category_id){
        Category::onlyTrashed()->find($category_id)->restore();
        return back()->with('restore', 'Category restored Successfully');
    }
}
