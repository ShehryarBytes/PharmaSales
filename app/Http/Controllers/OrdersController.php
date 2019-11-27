<?php

namespace App\Http\Controllers;

use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Cart;
use Illuminate\Http\Request;

use App\Order;

use Illuminate\Support\Facades\Auth;

use DB;
use App\Customer as Customer;

use App\Employee;

use App\Orderdetails;

use App\Products;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index')->with(compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


//        $customer = Customer::pluck('Store_Name','id');
//
//        $employee = Employee::where('role_id',3)->pluck('name','id');

        $product = Products::all();
        if(Auth::guard('employee')->user()) {
            $employeeid = Auth::guard('employee')->user()->id;
            return view('admin.orders.create')->with(compact('product'))->with(compact('employeeid'));
        }
        }

    public function confirm()
    {



    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'employee_id' => 'required',
            'delivered' => 'required',
            'total_amount' => 'required',



        ]);
        $order = Order::create($request->all());


        // Order Details Insertion

        $orderdetails = new Orderdetails;
           $orderdetails->employee_id = $request->employee_id;
            $orderdetails->customer_id =$request->customer_id;
            $orderdetails->city = $order->customer->Address;
            $orderdetails->phone = $order->customer->Contact;
            $orderdetails->save();

            // Insertion into order_product
        $cartitem = Cart::content();

        foreach ($cartitem as $cartitem) {
            $cartitemno = $cartitem->qty;
            $proid = Products::where('Product_Name',$cartitem->name)->first();
            DB::table('order_product')->insert([
                [
                    'product_id' => $proid->id,
                    'order_id' => $order->id,
                    'qty' => $cartitemno,
                ]
            ]);
        }
        Cart::destroy();



        return redirect('orders');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $customer = Customer::pluck('Store_Name','id');
        $cartItems=Cart::content();
        return view('admin.orders.confirm')->with(compact('customer'))->with(compact('cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.update')->with(compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        return redirect('orders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::whereId($id)->delete();

        return redirect('orders');

        $order->delete();
    }
}
