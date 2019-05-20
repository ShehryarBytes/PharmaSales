<?php

namespace App\Http\Controllers;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Employee::all();

        return view('admin.employees.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::pluck('name','id');
        $user = User::find(Auth::id());
        $id = $user->id;
        return view('admin.employees.create')->with(compact('id'))->with(compact('role'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees',
            'CNIC' => 'required|max:14',
            'adress' => 'required|max:255',
            'contact' => 'required|min:11|max:14',
            'gender' => 'required',
            'qualification' => 'required',
            'Salary' => 'required',
            'DOB' => 'required',
            'password'=>'required|string|min:6|confirmed',
        ]);


        $input = $request->all();

        $input['password'] = Hash::make($request['password']);

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        Employee::create($input);

        return redirect('employees');


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
        $user = Employee::findOrFail($id);
        return view('admin.employees.show')->with(compact('user'));
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
        $employee = Employee::findOrFail($id);
        $role = Role::pluck('name', 'id');
        $user = User::find(Auth::id());
        $id = $user->id;
        $gender = array('Male','Female');
        return view('admin.employees.update')->with(compact('id'))->with(compact('role'))->with(compact('gender'))->with(compact('employee'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'CNIC' => 'required|max:14',
            'adress' => 'required|max:255',
            'contact' => 'required|min:11|max:14',
            'gender' => 'required',
            'qualification' => 'required',
            'Salary' => 'required',
            'DOB' => 'required',
        ]);

        $user = Employee::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('photo_id')){

            $name = time().$file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        $user->update($input);

        return redirect('employees');

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
         Employee::findOrFail($id)->delete();

         return redirect('employees');
    }
}
