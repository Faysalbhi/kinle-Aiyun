<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Cart;
use App\Models\Order;
use App\Models\BillingDetail;
use App\Models\ShippingDetail;
use App\Models\OrderProduct;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerInvoice;
use Str;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    function index(){
        return view('frontend.checkout',[
            'countries'=>Country::all(),
            'carts'=>Cart::where('customer_id',Auth::guard('customer')->id())->get(),
        ]);
    }

    function getCity(Request $request){
             $str = '<option disabled>Select a City</option>';
            $cities = City::where('country_id', $request->country_id)->get();

            foreach($cities as $city){
                $str .= '<option value="'.$city->id.'">'.$city->name.'</option>';
            }
            echo $str;
    }





     function order_store(Request $request){
        $str = substr($request->shipping_address,1,3);

        $order_id = '#'.Str::upper($str).'-'.random_int(100000,999999);
        $grand_total=$request->total + $request->charge;
        if($request->payment_method == 1){
            
            Order::insert([
                'order_id'=> $order_id,
                'customer_id'=>Auth::guard('customer')->id(),
                'sub_total'=> $request->sub_total,
                'discount'=> $request->discount,
                'delivery_charge'=> $request->charge,
                'grand_total'=> $grand_total,
                'created_at'=> Carbon::now(),
            ]);

            BillingDetail::insert([
                'order_id'=>$order_id,
                'customer_id'=>Auth::guard('customer')->id(),
                'name'=>$request->billing_name,
                'email'=>$request->billing_email,
                'phone'=>$request->billing_phone,
                'address'=>$request->billing_address,
                'company'=>$request->billing_company,
                'created_at'=> Carbon::now(),
            ]);

            ShippingDetail::insert([
                'order_id'=>$order_id,
                'name'=>$request->shipping_name,
                'email'=>$request->shipping_email,
                'phone'=>$request->shipping_phone,
                'company'=>$request->shipping_company,
                'country_id'=>$request->country_id,
                'city_id'=>$request->city_id,
                'zipcode'=>$request->zipcode,
                'address'=>$request->shipping_address,
                'company'=>$request->shipping_company,
                'notes'=>$request->notes,
                'created_at'=> Carbon::now(),
            ]);

            $carts = Cart::where('customer_id', Auth::guard('customer')->id())->get();
            foreach($carts as $cart){
                OrderProduct::insert([
                    'order_id'=>$order_id,
                    'customer_id'=>Auth::guard('customer')->id(),
                    'product_id'=>$cart->product_id,
                    'color_id'=>$cart->color_id,
                    'size_id'=>$cart->size_id,
                    'price'=>$cart->product->after_discount,
                    'quantity'=>$cart->quantity,
                    'created_at'=> Carbon::now(),
                ]);
                $match=['product_id'=>$cart->product_id,'color_id'=>$cart->color_id,'size_id'=>$cart->size_id];
                Inventory::where($match)->decrement('quantity', $cart->quantity);
                // Cart::find($cart->id)->delete();
            }

            Mail::to($request->shipping_email)->send(new CustomerInvoice($order_id));




            //  $url = "http://bulksmsbd.net/api/getBalanceApi";
            // $api_key = "jsqtQFQL83FIFK3PpgL0";
            // $senderid ="8809617611036";
            // $number = $request->shipping_phone;
            // $message = "Your Order has been successfully placed! Your order id:$order_id, and Amount is:$grand_total";
            // $data = [
            //     "api_key" => $api_key,
            //     "senderid" => $senderid,
            //     "number" => $number,
            //     "message" => $message
            // ];
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // $response = curl_exec($ch);
            // curl_close($ch);
            // return $response;


            return redirect()->route('order.success')->withOrderid($order_id);
        }

        else if($request->payment_method == 2){

            $data = $request->all();
            return redirect()->route('pay')->with('data', $data);
        }

        else {
            $data = $request->all();
        dd($data);
            return view('backend.stripe.index', [
                'data'=>$data,
            ]);

        }
    }

}
