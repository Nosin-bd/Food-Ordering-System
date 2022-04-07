<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Resturant;
use App\Models\Menu;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;
use App\Mail\NotifyMail;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class FrontendHomeController extends Controller
{
    public function index(){
        $res = Resturant::all();
        return view('frontend.home')->with(compact('res'));
    }

    public function order( Request $request ){
        return redirect()->route('order.page',['res_id' => $request->res_id]);
    }

    public function orderPage( $res_id ){
        $res = Resturant::find($res_id);
        $menus = $res->menus;
        return view('frontend.order')->with(compact('res','menus'));
    }

    public function createOrder( Request $request, $res_id ){

        $menu = Menu::find($request->menu_id);

        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->menu_id = $request->menu_id;
        $order->quantity = $request->quantity;
        $order->total_price = $request->quantity * $menu->price;
        $order->status = 0;
        $order->user_id = Auth::user()->id;
        $success = $order->save();

        if($success) {
            Alert::success('Success', 'Order Completed!');
        }
        return redirect()->route('order.page',['res_id' => $res_id]);
    }

    public function myOrder(){
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        return view('frontend.myorder')->with(compact('orders'));
    }

        // logic for mail

    public function contactSend( Request $request ){
        $details = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message
        ];
        Mail::to('nosinjesin90@gmail.com')->send(new NotifyMail($details));
        Alert::success('Success', 'Mail sent successfully!');

        return redirect()->route('contact.page');
    }

    public function registerPage(){
        return view('frontend.register');
    }

    public function loginPage(){
        return view('frontend.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('')
                        ->withSuccess('Signed in');
        }

        return redirect("login-page")->withSuccess('Login details are not valid');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/login-page");
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'address' => $data['address'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
