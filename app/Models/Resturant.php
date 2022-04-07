<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Resturant extends Model
{
    use HasFactory;

    /**
     * Get the menus for the res.
     */
    public function menus()
    {
        return $this->hasMany(Menu::class, 'res_id', 'id');
    }
}
