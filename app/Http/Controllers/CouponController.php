<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.coupon.index',[
            'coupons'=>Coupon::all(),
        ]);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request){
       Coupon::insert([
        'coupon_name'=>$request->coupon_name,
        'type'=>$request->type,
        'amount'=>$request->amount,
        'validity'=>$request->validity,
       ]);
       return back();
    }

    function check(Request $request){
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

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
