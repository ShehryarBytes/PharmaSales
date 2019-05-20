<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Companies;

use App\User;

use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Companies::all();


        return view('admin.companies.index')->with(compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());

        $id = $user->id;

        return view('admin.companies.create')->with(compact('id'));
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
            'email' => 'required|max:255',
            'Company_Name' => 'required',
            'Comany_Lisence_no' => 'required',
            'C_contact' => 'required',
            'C_adress' => 'required',

        ]);

        Companies::create($request->all());
        return redirect('companies');

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
        // return view('admin.companies.update');
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

        $companies = Companies::findOrFail($id);

        return view('admin.companies.update')->with(Compact('companies'));
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

        $companies = Companies::findOrFail($id);

        $companies->update($request->all());

        return redirect('companies');

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

        $companies = Companies::whereId($id)->delete();

        return redirect('companies');
    }
}
