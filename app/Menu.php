<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public function regMenu($name, $price) {
        Menu::insert([
            'name'  => $name,
            'price' => $price
        ]);
    }

    public function delMenu() {
        Menu::truncate();
    }
}
