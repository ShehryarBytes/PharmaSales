<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/employee/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employee.auth:employee');
    }

    /**
     * Show the Employee dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $employee = Auth::guard('employee')->user();
        return view('home')->with(compact('employee'));
    }

}