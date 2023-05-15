<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    function index(){
        return view('frontend.login_register');
    }
    function register(Request $request){

             Customer::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        return back();
    }

    public function login(Request $request){
    
        if(Auth::guard('customer')->attempt(['email'=> $request->email, 'password'=>$request->password])){
        
         return redirect('/');
        }
        else{
            return redirect()->route('login.register');
        }
    }

    public function invoice(Request $request,$order_id){
        $order_id='#'.$order_id;
        $data=view('invoice.invoice3',['data'=>$order_id])->render();
        $fileName="customer-invoice.pdf";

        $mpdf = new \Mpdf\Mpdf();

        $mpdf->WriteHTML($data);
        $mpdf->Output($fileName, 'I');
    }



    public function review_store(Request $request){
        OrderProduct::where(['product_id'=>$request->product_id,'customer_id'=>Auth::guard('customer')->id()])->update([
            'review'=>$request->review,
            'star'=>$request->star,
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
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
