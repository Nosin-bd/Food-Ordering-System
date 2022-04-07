<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resturant;
use App\Models\Order;

class HomeController extends Controller
{
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
        return view('home');
    }

    public function restaurant() {
        $res = Resturant::all();
        return view('restaurant_list')->with(compact('res'));
    }

    public function store( Request $request ){
        $res = new Resturant();
        $res->name = $request->name;
        $res->address = $request->address;
        $res->phone = $request->phone;
        $res->available_time = $request->available_time;
        $res->save();
        return redirect()->route('restaurant');
    }

    public function update( Request $request, $id ){
        $res = Resturant::find($id);
        $res->name = $request->name;
        $res->address = $request->address;
        $res->phone = $request->phone;
        $res->available_time = $request->available_time;
        $res->save();
        return redirect()->route('restaurant');
    }

    public function delete($id){
        $res = Resturant::find($id);
        $res->delete();
        return redirect()->route('restaurant');
    }

    public function restaurantMenu($id){
        $menus = [];
        if( Resturant::find($id) ){
            $menus = Resturant::find($id)->menus;
        }else{
            return redirect()->route('restaurant');
        }

        return view('menus')->with(compact('menus','id'));
    }

    public function ordersView(){
        $orders = Order::orderBy('id','desc')->get();
        return view('orders')->with(compact('orders'));
    }

    public function orderStatus(Request $request){
        $order = Order::find($request->order_id);
        $order->status= $request->status;
        $order->save();
        toast('Order status successfully updated!','success');
        return redirect()->route('orders.view');
    }

}
