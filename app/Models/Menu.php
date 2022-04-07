<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resturant;
use App\Models\Order;

class Menu extends Model
{
    use HasFactory;

    /**
     * Get the Res that owns the Menu.
     */
    public function restaurent()
    {
        return $this->belongsTo(Resturant::class);
    }

    public function findRes( $id ){
        $res = Resturant::find($id);
        return $res->name;
    }

    /**
     * Get the menus for the res.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'menu_id', 'id');
    }

}
