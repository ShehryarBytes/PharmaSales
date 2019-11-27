<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Area;

use App\User;

use Illuminate\Support\Facades\Auth;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('employee')->user()) {
            $user = User::find(Auth::guard('employee')->user()->user_id);
            $id = $user->id;
            $areas = Area::where('user_id', $id)->get();
            return view('admin.areas.index')->with(Compact('areas'));
        }

        $user = Auth::User();
        $id = $user->id;
        $areas = Area::where('user_id', $id)->get();
        return view('admin.areas.index')->with(Compact('areas'));

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

        return view('admin.areas.create')->with(Compact('id'));
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
            'name' => 'required',
            'code' => 'required|max:255',
            'no_of_stores' => 'required|max:255',


        ]);

        Area::create($request->all());

        return redirect('areas');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $area = Area::findOrFail($id);

        return view('admin.areas.update')->with(Compact('area'));
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
        $area = Area::findOrFail($id);

        $area->update($request->all());

        return redirect('areas');
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
        $area = Area::whereId($id)->delete();

        return redirect('areas');
    }
}
