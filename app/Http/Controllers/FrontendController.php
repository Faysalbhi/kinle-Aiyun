<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Thumbnail;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Order;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\OrderProduct;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Cookie;
use Arr;

class FrontendController extends Controller
{

    
      function index(){
        $topselling_product=OrderProduct::groupBy('product_id')
            ->selectRaw('sum(quantity) as quantity, product_id')
            ->orderBy('quantity','DESC')
            ->take(4)->get();
        $best_review_products=OrderProduct::groupBy('product_id')
            ->selectRaw('sum(star) as star, product_id')
            ->orderBy('star','DESC')
            ->take(4)->get();

        $recent_products = Product::latest()->take(4)->get();
        // $best_selling = Product::orderBy('created_at', 'DESC')->limit(4)->get();

        // $get_recent = json_decode(Cookie::get('recent_view'), true);
        // if($get_recent == null){
        //     $get_recent = [];
        //     $after_unique = array_unique($get_recent);
        // }
        // else{
        //     $after_unique = array_unique($get_recent);
        // }
        // $all_recent_product = Product::find($after_unique);

        return view('frontend.index', [
            'all_products'=>Product::latest()->get(),
            'categories'=>Category::all(),
            'topselling_product'=>$topselling_product,
            'recent_products'=>$recent_products,
            'best_review_products'=>$best_review_products,
        ]);
    }


    function single_product(Product $product){
        // $related_products = Product::where('category_id', $product_info->first()->category_id)->where('id', '!=', $product_info->first()->id)->get();
        // $available_colors = Inventory::where('product_id', $product_info->first()->id)->groupBy('color_id')->selectRaw('sum(color_id) as sum,color_id')->get();

        // $reviews = OrderProduct::where('product_id', $product_info->first()->id)->whereNotNull('review')->get();
        // $total_review = OrderProduct::where('product_id', $product_info->first()->id)->whereNotNull('review')->count();
        // $total_star = OrderProduct::where('product_id', $product_info->first()->id)->whereNotNull('review')->sum('star');
        // $product_id = $product_info->first()->id;

        // $al = Cookie::get('recent_view');
        // if(!$al){
        //     $al = "[]";
        // }

        // $all_info = json_decode($al, true);
        // $all_info = Arr::prepend($all_info, $product_id);
        // $recent_product_id = json_encode($all_info);

        // Cookie::queue('recent_view', $recent_product_id, 1000);

        return view('frontend.single_product', [
            'product_info'=>$product,
            'thumbnails'=>Thumbnail::where('product_id', $product->id)->get(),
            // 'related_products'=>$related_products,
            'available_colors'=>Inventory::where('product_id', $product->id)->groupBy('color_id')->selectRaw('color_id')->get(),
            'available_sizes'=>Inventory::where('product_id', $product->id)->groupBy('size_id')->selectRaw('size_id')->get(),
            // 'reviews'=>$reviews,
            // 'total_review'=>$total_review,
            // 'total_star'=>$total_star,
        ]);
    }



    
    function cart(){
        return view('frontend.cart');
    }
    
    

    function complete_order(){
        return view('frontend.complete-order');
    }
    
    function my_orders(){
        return view('frontend.my-orders');
    }
    
    function profileInfo(){
        return view('frontend.profile_info');
    }
    
     function wishlist(){
        return view('frontend.wishlist');
    }
    
    function contact(){
        return view('frontend.contact');
    }
    
     function about(){
        return view('frontend.about');
    }

     
   function getSize(Request $request){
        $str='';
        $sizes = Inventory::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();
        foreach($sizes as $size){
            

           $str.='
            <div class="form-check size-option form-option form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="size_id" id="size'.$size->size_id.'" value="'.$size->size_id.'">
            <label class="form-option-label" for="size'.$size->size_id.'">'.$size->size->size_name.'</label>
            </div>';
        }
        
        echo $str;
    }
}
