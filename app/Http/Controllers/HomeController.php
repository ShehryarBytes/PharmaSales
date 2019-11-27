<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Products;
use App\Customer;
use App\Companies;
use DB;
use Charts;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use FarhanWazir\GoogleMaps\GMaps;
use App\Charts\MonthlyOrders;

class HomeController extends Controller
{

    protected $redirectTo = 'login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //////////// Charts Data //////////////////
        $orders = Order::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))

            ->get();

         $chart = Charts::database($orders, 'line', 'highcharts')

            ->title("Monthly new Orders")

            ->elementLabel("Total Orders")

            ->dimensions(1000, 500)

            ->responsive(true)

            ->groupByMonth(date('Y'), true);

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

        $user = Auth::user();
        $id = $user->id;
        $customers = Customer::where('user_id',$id)->get();
        $companies = Companies::all();
        $Orders = Order::all();
        return view('home')->with(compact('customerschart'))->with(compact('map'))->with(compact('companies'))->with(compact('Orders'))->with(compact('customers'))->with(compact('chart'));
    }
}
