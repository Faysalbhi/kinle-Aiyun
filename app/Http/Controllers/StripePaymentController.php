<?php
    
namespace App\Http\Controllers;
     
use Illuminate\Http\Request;
use Session;
use Stripe;
use DB;
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
     
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {   
        return view('backend.stripe.index');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */


    public function stripePost(Request $request){

    
   


    $data=session('data');
    $str =  substr($data['shipping_address'],2,3);
    $order_id = '#'.Str::upper($str).'-'.random_int(100000,999999);
    $grand_total=$data['total'] + $data['charge'];

    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $customer = Stripe\Customer::create(array(

            "address" => [
                    "line1" => "Virani Chowk",
                    "postal_code" => "360001",
                    "city" => "Rajkot",
                    "state" => "GJ",
                    "country" => "IN",
                ],
            "email" => $data['billing_email'],
            "name" => $data['billing_name'],
            "source" => $request->stripeToken
         ));
    Stripe\Charge::create ([
            "amount" => $grand_total,
            "currency" => "usd",
            "customer" => $customer->id,
            "description" => "Payment For testing From Kinile Aiyun",
            "shipping" => [
              "name" => $data['shipping_name'],
              "address" => [
                "line1" => $data['shipping_address'],
                "postal_code" => $data['zipcode'],
                "city" => $data['city_id'],
                "state" => "CA",
                "country" => "US",
              ],
            ]
    ]); 

    
        
            $trx_id=random_int(10000000000000,99999999999999);;
            
            Order::insert([
                'order_id'=> $order_id,
                'customer_id'=>Auth::guard('customer')->id(),
                'sub_total'=> $data['sub_total'],
                'discount'=> $data['discount'],
                'delivery_charge'=> $data['charge'],
                'grand_total'=> $grand_total,
                'trx_id'=> $trx_id,
                'created_at'=> Carbon::now(),
            ]);

            BillingDetail::insert([
                'order_id'=>$order_id,
                'customer_id'=>Auth::guard('customer')->id(),
                'name'=>$data['billing_name'],
                'email'=>$data['billing_email'],
                'phone'=>$data['billing_phone'],
                'address'=>$data['billing_address'],
                'company'=>$data['billing_company'],
                'created_at'=> Carbon::now(),
            ]);

            ShippingDetail::insert([
                'order_id'=>$order_id,
                'name'=>$data['shipping_name'],
                'email'=>$data['shipping_email'],
                'phone'=>$data['shipping_phone'],
                'company'=>$data['shipping_company'],
                'country_id'=>$data['country_id'],
                'city_id'=>$data['city_id'],
                'zipcode'=>$data['zipcode'],
                'address'=>$data['shipping_address'],
                'company'=>$data['shipping_company'],
                'notes'=>$data['notes'],
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

            Mail::to($data['shipping_email'])->send(new CustomerInvoice($order_id));




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
}