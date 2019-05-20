<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()) {
            $data = Products::all();
            return view('Admin.Products.index')->with(compact('data'));
     }
        elseif
            (Auth::guard('employee'))
            {
            $data = Products::all();
            return view('Admin.Products.index')->with(compact('data'));
        }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::find(Auth::id());
        $id = $user->id;
        return view('admin.products.create')->with(compact('id'));
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
            'Product_Name' => 'required|max:255',
            'Cost' => 'required',
            'Tax' => 'required',
            'KG' => 'required',
            'T_amount' => 'required',
            'quantity' => 'required',
            'batch' => 'required',
            'Exp_Date' => 'required',
            'Mfg_Date' => 'required',
            'Bonus' => 'required',
    ]);

        Products::create($request->all());
        return redirect('products');

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
        return view('admin.products.update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Products::findOrFail($id);
        return view('admin.products.update')->with(compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validatedData = $request->validate([
            'Product_Name' => 'required|max:255',
            'Cost' => 'required',
            'Tax' => 'required',
            'KG' => 'required',
            'T_amount' => 'required',
            'quantity' => 'required',
            'batch' => 'required',
            'Exp_Date' => 'required',
            'Mfg_Date' => 'required',
            'Bonus' => 'required',
        ]);

        Products::update($request->all());
        return redirect('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Products::findOrFail($id)->delete();

        return redirect('products');
    }
}
