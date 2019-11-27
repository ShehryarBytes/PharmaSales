<?php

namespace App\Http\Controllers\Employee;

use App\Order;
use App\User;
use App\Customer;
use App\Companies;
use App\Products;
use DB;
use Charts;

use Illuminate\Support\Facades\Auth;
use FarhanWazir\GoogleMaps\GMaps;
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

        $orders = Order::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))

            ->get();

        $chart = Charts::database($orders, 'line', 'highcharts')

            ->title("Monthly new Orders")

            ->elementLabel("Total Orders")

            ->dimensions(1000, 500)

            ->responsive(true)

            ->groupByMonth(date('Y'), true);

        /////////////// Charts Data ************ /////////////////
        /////////////// Charts Data ************ /////////////////
        $customers = Customer::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))

            ->get();

        $customerschart = Charts::database($customers, 'line', 'highcharts')

            ->title("Monthly new Customers")

            ->elementLabel("Total Customers")

            ->dimensions(1000, 500)

            ->responsive(true)

            ->groupByMonth(date('Y'), true);

        ////////// Charts Data **********////////////////

        ////////// Map Setting /////////
        $config['center'] = 'Sydney Airport,Sydney';
        $config['zoom'] = '14';
        $config['map_height'] = '400px';

        $gmap = new GMaps();
        $gmap->initialize($config);

        $map = $gmap->create_map();

        //////////// Map Setting ************///////////





        if(Auth::guard('employee')->user()->role->name == 'Manager')
        {
            $user = User::find(Auth::guard('employee')->user()->user_id);
            $id = $user->id;
            $products = Products::where('user_id',$id)->get();
            $customers = Customer::where('user_id',$id)->get();
            $companies = Companies::all();
            $Orders = Order::all();
            return view('home')->with(compact('customerschart'))->with(compact('chart'))->with(compact('map'))->with(compact('Orders'))->with(compact('customers'))->with(compact('companies'))->with(compact('products'));
        }

        $Orders = Order::all();
        return view('home')->with(compact('chart'))->with('Orders',$Orders);
    }

}