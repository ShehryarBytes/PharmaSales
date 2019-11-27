<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;

use App\Category;

use App\User;

use App\Area;

use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('employee')->user())
        {
            $user = User::find(Auth::guard('employee')->user()->user_id);
            $id = $user->id;
            $customers = Customer::where('user_id',$id)->get();

            return view('admin.customers.index')->with(Compact('customers'));

        }

        $user = Auth::User();
        $id = $user->id;
        $customers = Customer::where('user_id',$id)->get();

        return view('admin.customers.index')->with(Compact('customers'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::pluck('name','id');

        $area = Area::pluck('name','id');

        $user = User::find(Auth::id());

        $id = $user->id;

        return view('admin.customers.create')->with(compact('category'))->with(compact('id'))->with(Compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'category_id' => 'required',
            'area_id' => 'required',
            'Store_Name' => 'required|max:255',
            'Owner_Name' => 'required|max:255',
            'C_License_no' => 'required',
            'Email' => 'required|unique:customers',
            'Address' => 'required',
            'Contact' => 'required|min:11|max:16',


        ]);

        Customer::create($request->all());
        return redirect('customers');






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
        // return view('admin.customers.update');
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
        $category = Category::pluck('name','id');
        $area = Area::pluck('name','id');
        $customer = Customer::findOrFail($id);
        return view('admin.customers.update')->with(Compact('customer'))->with(Compact('area'))->with(Compact('category'));

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
        //
        $customer = Customer::findOrFail($id);

        $customer->update($request->all());

        return redirect('customers');

    }
    public function testing()
    {
        //


        return view('admin.customers.testing');

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
        $customer = Customer::whereId($id)->delete();
        return redirect('/customers');
    }
}
