<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
        function index(Request $request){
       
         $coupon = $request->coupon;
        $message = null;
        $type = null;

        if($coupon == ''){
            $discount = 0;
        }
        else{
            if(Coupon::where('coupon_name', $coupon)->exists()){
                if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon)->first()->validity){
                    $message = 'Coupon Code Expired';
                    $discount = 0;
                }
                else{
                    $discount = Coupon::where('coupon_name', $coupon)->first()->amount;
                    $type = Coupon::where('coupon_name', $coupon)->first()->type;
                }
            }
            else{
                $message = 'Invalid Coupon Code';
                $discount = 0;
            }
        }
        $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.cart', [
            'carts'=>Cart::where('customer_id',Auth::guard('customer')->id())->get(),
            'discount'=>$discount,
            'message'=>$message,
            'type'=>$type,
        ]);
    }
    
    
    function store(Request $request){
        $customer_id=Auth::guard('customer')->id();
        $match=['customer_id'=>$customer_id,'product_id'=>$request->product_id,'color_id'=>$request->color_id,'size_id'=>$request->size_id];
        if(Cart::where($match)->exists()){
            Cart::where($match)->increment('quantity',$request->quantity);
        }else{
            Cart::insert([
            'customer_id'=>$customer_id,
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
         ]);
        }
         
         return back()->with('success', 'successfully Cart Added!');
    }

    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Cart $cart){
        $cart->delete();
        return back()->with('success', 'successfully Cart Removed!');
    }
}
