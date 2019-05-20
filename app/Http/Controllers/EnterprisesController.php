<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnterprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::find(Auth::id());
        $id = $user->id;
        $data = Enterprise::all()->first();
         return view('admin.enterprise.index')->with(compact('data'));
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
        return view('admin.enterprise.create')->with(compact('id'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:enterprises',
            'license' => 'required|max:14',
            'location' => 'required|max:255',
            'mobile' => 'required|min:11|max:14',
            'phone' => 'required|min:11|max:14',
            'disttrict' => 'required',
            'user_id' => 'required|unique:enterprises',
            'photo_id' => 'required',
        ]);


        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        Enterprise::create($input);

        return redirect('enterprise');



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
        $data = Enterprise::findOrFail($id);
        $user = User::find(Auth::id());
        $id = $user->id;
        return view('admin.enterprise.edit')->with(compact('id'))->with(compact('data'));

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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'license' => 'required|max:14',
            'location' => 'required|max:255',
            'mobile' => 'required|min:11|max:14',
            'phone' => 'required|min:11|max:14',
            'disttrict' => 'required',
            'photo_id' => 'required',
        ]);

        $user = Enterprise::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        $user->update($input);

        return redirect('enterprise');

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
    }
}
