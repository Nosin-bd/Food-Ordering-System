<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('this is menu page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $imageName = '';
        if( isset( $request->img ) ) {
            $imageName = time().substr( sha1( $request->img->getClientOriginalName() ), 0, 5 ).'.'.$request->img->extension();
            $request->img->move(public_path('uploads/foods/'), $imageName);
        }

        $menu = new Menu();
        $menu->food_name = $request->food_name;
        $menu->price = $request->price;
        $menu->img = $imageName;
        $menu->res_id = $id;
        $menu->save();
        return redirect()->route('restaurant.menu',['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $res_id)
    {
        $imageName = '';
        if( isset( $request->img ) ) {
            $imageName = time().substr( sha1( $request->img->getClientOriginalName() ), 0, 5 ).'.'.$request->img->extension();
            $request->img->move(public_path('uploads/foods/'), $imageName);
        }

        $menu = Menu::Find($id);
        $menu->food_name = $request->food_name;
        $menu->price = $request->price;
        if( ! empty( $imageName ) ){
            $menu->img = $imageName;
        }
        $menu->save();
        return redirect()->route('restaurant.menu',['id'=>$res_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $menu = Menu::Find($id);
        $menu->delete();
        return redirect()->route('restaurant.menu',['id'=>$id]);
    }
}
